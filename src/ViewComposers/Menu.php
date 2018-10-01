<?php

namespace LaravelAdmin\Base\ViewComposers;

use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class Menu
{
    public function compose(View $view)
    {
        $menu = collect(config('admin.menu'));

        $menu = $menu->filter([$this, '_filterRole'])->map([$this, '_completeFields']);
        $menu = $menu->map(function ($item) {
            $item['children'] = $item['children']->filter([$this, '_filterRole'])->map([$this, '_completeFields']);
            $item['children'] = $item['children']->map(function ($item) {
                $item['children'] = $item['children']->filter([$this, '_filterRole'])->map([$this, '_completeFields']);
                return $item;
            });
            return $item;
        });

        $view->items = $menu;
    }

    /**
     * Filter the menu to only contain the items for which the user is authorized
     * @param  array  $item
     * @return boolean
     */
    public function _filterRole(array $item) : bool
    {
        // If no roles are specified, everyone is allowed
        if (!isset($item['roles'])) {
            return true;
        }

        // Allow the item if the user has one of the roles specified
        foreach ($item['roles'] as $role) {
            if (Gate::allows('has-role', $role)) {
                return true;
            }
        }

        // Reject all other users
        return false;
    }

    /**
     * Parse a menu item complete the fields we need with defaults, etc.
     * Should not be called from outside this class, but is required by the filter
     * to be public.
     * @param  array  $item
     * @return array completed item
     */
    public function _completeFields(array $item) : array
    {
        // Fix the URL to include leading path, or be # if empty
        if (empty($item['url'])) {
            $item['url'] = '#';
        } else {
            $item['url'] = config('admin.url') . $item['url'];
        }

        // Ensure children exists
        if (!isset($item['children'])) {
            $item['children'] = [];
        }

        $item['children'] = collect($item['children']);

        return $item;
    }
}
