<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\DBContext{
/**
 * App\DBContext\DBContextImage
 *
 * @property int $id
 * @property int $user_id
 * @property int $project_id
 * @property string $uid
 * @property int $file_size
 * @property string $original_file_name
 * @property string $public_url
 * @property string $public_url_hash
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\DBContext\DBContextProject $project
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextImage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextImage whereFileSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextImage whereOriginalFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextImage whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextImage wherePublicUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextImage wherePublicUrlHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextImage whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextImage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextImage whereUserId($value)
 */
	class DBContextImage extends \Eloquent {}
}

namespace App\DBContext{
/**
 * App\DBContext\DBContextImageLog
 *
 * @property int $id
 * @property string $action
 * @property int $user_id
 * @property int $project_id
 * @property int $image_id
 * @property string $image_uid
 * @property string $file_ext
 * @property int $file_size
 * @property string $original_file_name
 * @property string $local_file_path
 * @property string $local_file_name
 * @property string $public_url
 * @property string $public_url_hash
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\DBContext\DBContextProject $project
 * @property-read \App\DBContext\DBContextUser $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextImageLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextImageLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextImageLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextImageLog whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextImageLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextImageLog whereFileExt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextImageLog whereFileSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextImageLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextImageLog whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextImageLog whereImageUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextImageLog whereLocalFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextImageLog whereLocalFilePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextImageLog whereOriginalFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextImageLog whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextImageLog wherePublicUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextImageLog wherePublicUrlHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextImageLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextImageLog whereUserId($value)
 */
	class DBContextImageLog extends \Eloquent {}
}

namespace App\DBContext{
/**
 * App\DBContext\DBContextProject
 *
 * @property int $id
 * @property string $uid
 * @property int $user_id
 * @property string $name
 * @property string $api_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextProject newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextProject newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextProject query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextProject whereApiToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextProject whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextProject whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextProject whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextProject whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextProject whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextProject whereUserId($value)
 */
	class DBContextProject extends \Eloquent {}
}

namespace App\DBContext{
/**
 * App\DBContext\DBContextUser
 *
 * @property int $id
 * @property string $uid
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string $api_token
 * @property string $role
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextUser whereApiToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextUser whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextUser whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextUser whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextUser wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextUser whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextUser whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextUser whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\DBContext\DBContextUser whereUpdatedAt($value)
 */
	class DBContextUser extends \Eloquent {}
}

