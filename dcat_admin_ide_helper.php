<?php

/**
 * A helper file for Dcat Admin, to provide autocomplete information to your IDE
 *
 * This file should not be included in your code, only analyzed by your IDE!
 *
 * @author jqh <841324345@qq.com>
 */
namespace Dcat\Admin {
    use Illuminate\Support\Collection;

    /**
     * @property Grid\Column|Collection id
     * @property Grid\Column|Collection name
     * @property Grid\Column|Collection norms
     * @property Grid\Column|Collection category
     * @property Grid\Column|Collection price
     * @property Grid\Column|Collection shop_name
     * @property Grid\Column|Collection brand
     * @property Grid\Column|Collection state
     * @property Grid\Column|Collection added_at
     * @property Grid\Column|Collection images
     * @property Grid\Column|Collection year
     * @property Grid\Column|Collection rating
     * @property Grid\Column|Collection directors
     * @property Grid\Column|Collection casts
     * @property Grid\Column|Collection genres
     * @property Grid\Column|Collection type
     * @property Grid\Column|Collection version
     * @property Grid\Column|Collection detail
     * @property Grid\Column|Collection created_at
     * @property Grid\Column|Collection updated_at
     * @property Grid\Column|Collection is_enabled
     * @property Grid\Column|Collection parent_id
     * @property Grid\Column|Collection order
     * @property Grid\Column|Collection icon
     * @property Grid\Column|Collection uri
     * @property Grid\Column|Collection extension
     * @property Grid\Column|Collection permission_id
     * @property Grid\Column|Collection menu_id
     * @property Grid\Column|Collection slug
     * @property Grid\Column|Collection http_method
     * @property Grid\Column|Collection http_path
     * @property Grid\Column|Collection role_id
     * @property Grid\Column|Collection user_id
     * @property Grid\Column|Collection value
     * @property Grid\Column|Collection username
     * @property Grid\Column|Collection password
     * @property Grid\Column|Collection avatar
     * @property Grid\Column|Collection remember_token
     * @property Grid\Column|Collection start_time
     * @property Grid\Column|Collection end_time
     * @property Grid\Column|Collection mobile
     * @property Grid\Column|Collection vote_number
     * @property Grid\Column|Collection vote_number_one
     * @property Grid\Column|Collection vote_number_two
     * @property Grid\Column|Collection vote_number_three
     * @property Grid\Column|Collection vote_number_four
     * @property Grid\Column|Collection win_num
     * @property Grid\Column|Collection date
     * @property Grid\Column|Collection deleted_at
     * @property Grid\Column|Collection email
     * @property Grid\Column|Collection token
     * @property Grid\Column|Collection ip_address
     * @property Grid\Column|Collection user_agent
     * @property Grid\Column|Collection payload
     * @property Grid\Column|Collection last_activity
     * @property Grid\Column|Collection email_verified_at
     *
     * @method Grid\Column|Collection id(string $label = null)
     * @method Grid\Column|Collection name(string $label = null)
     * @method Grid\Column|Collection norms(string $label = null)
     * @method Grid\Column|Collection category(string $label = null)
     * @method Grid\Column|Collection price(string $label = null)
     * @method Grid\Column|Collection shop_name(string $label = null)
     * @method Grid\Column|Collection brand(string $label = null)
     * @method Grid\Column|Collection state(string $label = null)
     * @method Grid\Column|Collection added_at(string $label = null)
     * @method Grid\Column|Collection images(string $label = null)
     * @method Grid\Column|Collection year(string $label = null)
     * @method Grid\Column|Collection rating(string $label = null)
     * @method Grid\Column|Collection directors(string $label = null)
     * @method Grid\Column|Collection casts(string $label = null)
     * @method Grid\Column|Collection genres(string $label = null)
     * @method Grid\Column|Collection type(string $label = null)
     * @method Grid\Column|Collection version(string $label = null)
     * @method Grid\Column|Collection detail(string $label = null)
     * @method Grid\Column|Collection created_at(string $label = null)
     * @method Grid\Column|Collection updated_at(string $label = null)
     * @method Grid\Column|Collection is_enabled(string $label = null)
     * @method Grid\Column|Collection parent_id(string $label = null)
     * @method Grid\Column|Collection order(string $label = null)
     * @method Grid\Column|Collection icon(string $label = null)
     * @method Grid\Column|Collection uri(string $label = null)
     * @method Grid\Column|Collection extension(string $label = null)
     * @method Grid\Column|Collection permission_id(string $label = null)
     * @method Grid\Column|Collection menu_id(string $label = null)
     * @method Grid\Column|Collection slug(string $label = null)
     * @method Grid\Column|Collection http_method(string $label = null)
     * @method Grid\Column|Collection http_path(string $label = null)
     * @method Grid\Column|Collection role_id(string $label = null)
     * @method Grid\Column|Collection user_id(string $label = null)
     * @method Grid\Column|Collection value(string $label = null)
     * @method Grid\Column|Collection username(string $label = null)
     * @method Grid\Column|Collection password(string $label = null)
     * @method Grid\Column|Collection avatar(string $label = null)
     * @method Grid\Column|Collection remember_token(string $label = null)
     * @method Grid\Column|Collection start_time(string $label = null)
     * @method Grid\Column|Collection end_time(string $label = null)
     * @method Grid\Column|Collection mobile(string $label = null)
     * @method Grid\Column|Collection vote_number(string $label = null)
     * @method Grid\Column|Collection vote_number_one(string $label = null)
     * @method Grid\Column|Collection vote_number_two(string $label = null)
     * @method Grid\Column|Collection vote_number_three(string $label = null)
     * @method Grid\Column|Collection vote_number_four(string $label = null)
     * @method Grid\Column|Collection win_num(string $label = null)
     * @method Grid\Column|Collection date(string $label = null)
     * @method Grid\Column|Collection deleted_at(string $label = null)
     * @method Grid\Column|Collection email(string $label = null)
     * @method Grid\Column|Collection token(string $label = null)
     * @method Grid\Column|Collection ip_address(string $label = null)
     * @method Grid\Column|Collection user_agent(string $label = null)
     * @method Grid\Column|Collection payload(string $label = null)
     * @method Grid\Column|Collection last_activity(string $label = null)
     * @method Grid\Column|Collection email_verified_at(string $label = null)
     */
    class Grid {}

    class MiniGrid extends Grid {}

    /**
     * @property Show\Field|Collection id
     * @property Show\Field|Collection name
     * @property Show\Field|Collection norms
     * @property Show\Field|Collection category
     * @property Show\Field|Collection price
     * @property Show\Field|Collection shop_name
     * @property Show\Field|Collection brand
     * @property Show\Field|Collection state
     * @property Show\Field|Collection added_at
     * @property Show\Field|Collection images
     * @property Show\Field|Collection year
     * @property Show\Field|Collection rating
     * @property Show\Field|Collection directors
     * @property Show\Field|Collection casts
     * @property Show\Field|Collection genres
     * @property Show\Field|Collection type
     * @property Show\Field|Collection version
     * @property Show\Field|Collection detail
     * @property Show\Field|Collection created_at
     * @property Show\Field|Collection updated_at
     * @property Show\Field|Collection is_enabled
     * @property Show\Field|Collection parent_id
     * @property Show\Field|Collection order
     * @property Show\Field|Collection icon
     * @property Show\Field|Collection uri
     * @property Show\Field|Collection extension
     * @property Show\Field|Collection permission_id
     * @property Show\Field|Collection menu_id
     * @property Show\Field|Collection slug
     * @property Show\Field|Collection http_method
     * @property Show\Field|Collection http_path
     * @property Show\Field|Collection role_id
     * @property Show\Field|Collection user_id
     * @property Show\Field|Collection value
     * @property Show\Field|Collection username
     * @property Show\Field|Collection password
     * @property Show\Field|Collection avatar
     * @property Show\Field|Collection remember_token
     * @property Show\Field|Collection start_time
     * @property Show\Field|Collection end_time
     * @property Show\Field|Collection mobile
     * @property Show\Field|Collection vote_number
     * @property Show\Field|Collection vote_number_one
     * @property Show\Field|Collection vote_number_two
     * @property Show\Field|Collection vote_number_three
     * @property Show\Field|Collection vote_number_four
     * @property Show\Field|Collection win_num
     * @property Show\Field|Collection date
     * @property Show\Field|Collection deleted_at
     * @property Show\Field|Collection email
     * @property Show\Field|Collection token
     * @property Show\Field|Collection ip_address
     * @property Show\Field|Collection user_agent
     * @property Show\Field|Collection payload
     * @property Show\Field|Collection last_activity
     * @property Show\Field|Collection email_verified_at
     *
     * @method Show\Field|Collection id(string $label = null)
     * @method Show\Field|Collection name(string $label = null)
     * @method Show\Field|Collection norms(string $label = null)
     * @method Show\Field|Collection category(string $label = null)
     * @method Show\Field|Collection price(string $label = null)
     * @method Show\Field|Collection shop_name(string $label = null)
     * @method Show\Field|Collection brand(string $label = null)
     * @method Show\Field|Collection state(string $label = null)
     * @method Show\Field|Collection added_at(string $label = null)
     * @method Show\Field|Collection images(string $label = null)
     * @method Show\Field|Collection year(string $label = null)
     * @method Show\Field|Collection rating(string $label = null)
     * @method Show\Field|Collection directors(string $label = null)
     * @method Show\Field|Collection casts(string $label = null)
     * @method Show\Field|Collection genres(string $label = null)
     * @method Show\Field|Collection type(string $label = null)
     * @method Show\Field|Collection version(string $label = null)
     * @method Show\Field|Collection detail(string $label = null)
     * @method Show\Field|Collection created_at(string $label = null)
     * @method Show\Field|Collection updated_at(string $label = null)
     * @method Show\Field|Collection is_enabled(string $label = null)
     * @method Show\Field|Collection parent_id(string $label = null)
     * @method Show\Field|Collection order(string $label = null)
     * @method Show\Field|Collection icon(string $label = null)
     * @method Show\Field|Collection uri(string $label = null)
     * @method Show\Field|Collection extension(string $label = null)
     * @method Show\Field|Collection permission_id(string $label = null)
     * @method Show\Field|Collection menu_id(string $label = null)
     * @method Show\Field|Collection slug(string $label = null)
     * @method Show\Field|Collection http_method(string $label = null)
     * @method Show\Field|Collection http_path(string $label = null)
     * @method Show\Field|Collection role_id(string $label = null)
     * @method Show\Field|Collection user_id(string $label = null)
     * @method Show\Field|Collection value(string $label = null)
     * @method Show\Field|Collection username(string $label = null)
     * @method Show\Field|Collection password(string $label = null)
     * @method Show\Field|Collection avatar(string $label = null)
     * @method Show\Field|Collection remember_token(string $label = null)
     * @method Show\Field|Collection start_time(string $label = null)
     * @method Show\Field|Collection end_time(string $label = null)
     * @method Show\Field|Collection mobile(string $label = null)
     * @method Show\Field|Collection vote_number(string $label = null)
     * @method Show\Field|Collection vote_number_one(string $label = null)
     * @method Show\Field|Collection vote_number_two(string $label = null)
     * @method Show\Field|Collection vote_number_three(string $label = null)
     * @method Show\Field|Collection vote_number_four(string $label = null)
     * @method Show\Field|Collection win_num(string $label = null)
     * @method Show\Field|Collection date(string $label = null)
     * @method Show\Field|Collection deleted_at(string $label = null)
     * @method Show\Field|Collection email(string $label = null)
     * @method Show\Field|Collection token(string $label = null)
     * @method Show\Field|Collection ip_address(string $label = null)
     * @method Show\Field|Collection user_agent(string $label = null)
     * @method Show\Field|Collection payload(string $label = null)
     * @method Show\Field|Collection last_activity(string $label = null)
     * @method Show\Field|Collection email_verified_at(string $label = null)
     */
    class Show {}

    /**
     
     */
    class Form {}

}

namespace Dcat\Admin\Grid {
    /**
     * @method $this code(...$params)
     */
    class Column {}

    /**
     
     */
    class Filter {}
}

namespace Dcat\Admin\Show {
    /**
     
     */
    class Field {}
}
