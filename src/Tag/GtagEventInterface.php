<?php

declare(strict_types=1);

namespace Setono\TagBag\Tag;

interface GtagEventInterface extends GtagInterface
{
    /**
     * The list of events are taken from here: https://developers.google.com/gtagjs/reference/event
     */
    public const EVENT_ADD_PAYMENT_INFO = 'add_payment_info';

    public const EVENT_ADD_TO_CART = 'add_to_cart';

    public const EVENT_ADD_TO_WISHLIST = 'add_to_wishlist';

    public const EVENT_BEGIN_CHECKOUT = 'begin_checkout';

    public const EVENT_CHECKOUT_PROGRESS = 'checkout_progress';

    public const EVENT_EXCEPTION = 'exception';

    public const EVENT_GENERATE_LEAD = 'generate_lead';

    public const EVENT_LOGIN = 'login';

    public const EVENT_PAGE_VIEW = 'page_view';

    public const EVENT_PURCHASE = 'purchase';

    public const EVENT_REFUND = 'refund';

    public const EVENT_REMOVE_FROM_CART = 'remove_from_cart';

    public const EVENT_SCREEN_VIEW = 'screen_view';

    public const EVENT_SEARCH = 'search';

    public const EVENT_SELECT_CONTENT = 'select_content';

    public const EVENT_SET_CHECKOUT_OPTION = 'set_checkout_option';

    public const EVENT_SHARE = 'share';

    public const EVENT_SIGN_UP = 'sign_up';

    public const EVENT_TIMING_COMPLETE = 'timing_complete';

    public const EVENT_VIEW_ITEM = 'view_item';

    public const EVENT_VIEW_ITEM_LIST = 'view_item_list';

    public const EVENT_VIEW_PROMOTION = 'view_promotion';

    public const EVENT_VIEW_SEARCH_RESULTS = 'view_search_results';

    public function getEvent(): string;
}
