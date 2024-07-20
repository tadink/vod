<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace App\Constants;

use Hyperf\Constants\AbstractConstants;
use Hyperf\Constants\Annotation\Constants;
use Hyperf\Constants\Annotation\Message;

#[Constants]
class ErrorCode extends AbstractConstants
{
    /**
     * @Message("Server Error！")
     */
    public const SERVER_ERROR = 500;

    #[Message("影视类型错误")]
    public const VOD_TYPE_ERROR = 6000;

    #[Message("影视资源不存在")]
    public const VOD_NOT_EXISTS = 6011;

    #[Message("vod_id 参数错误")]
    public const VOD_ID_ERROR = 6021;

    #[Message("url_id 参数错误")]
    public const VOD_URL_ID_ERROR = 6022;

    #[Message("暂无播放地址")]
    public const VOD_URL_EMPTY = 6023;
}
