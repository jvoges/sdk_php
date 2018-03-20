<?php
namespace bunq\test\Model\Generated\Endpoint;

use bunq\Http\ApiClient;
use bunq\Model\Generated\Endpoint\AttachmentPublic;
use bunq\Model\Generated\Endpoint\AttachmentPublicContent;
use bunq\Model\Generated\Endpoint\Avatar;
use bunq\test\BunqSdkTestBase;
use bunq\test\Config;
use bunq\Util\FileUtil;

/**
 * Tests:
 *  AttachmentPublic
 *  AttachmentPublicContent Avatar
 */
class AvatarTest extends BunqSdkTestBase
{
    /**
     * Index number of the first item in an array.
     */
    const INDEX_FIRST = 0;

    /**
     *  Points to the directory where attachments are stored.
     */
    const PATH_ATTACHMENT = '/../../../Resource/';

    /**
     * @var string
     */
    private static $contentType;

    /**
     * @var string
     */
    private static $attachmentDescription;

    /**
     * @var string
     */
    private static $attachmentPathIn;

    /**
     */
    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();
        static::$attachmentDescription = Config::getAttachmentDescription();
        static::$attachmentPathIn = Config::getAttachmentPathIn();
        static::$contentType = Config::getAttachmentContentType();
    }

    /**
     * Tests the creation of a new avatar.
     */
    public function testCreateAvatar()
    {
        $fileContentsBefore = $this->getFileContentsOfAttachment();
        $customHeadersMap = [
            ApiClient::HEADER_ATTACHMENT_DESCRIPTION => static::$attachmentDescription,
            ApiClient::HEADER_CONTENT_TYPE => static::$contentType,
        ];

        $attachmentUuidBefore = AttachmentPublic::create(
            $fileContentsBefore,
            $customHeadersMap
        )->getValue();
        $avatarUuid = Avatar::create($attachmentUuidBefore)->getValue();

        $attachmentUuidAfter = Avatar::get($avatarUuid)->getValue();
        $imageInfoArray = $attachmentUuidAfter->getImage();
        $attachmentPublicUuid = $imageInfoArray[self::INDEX_FIRST]->getAttachmentPublicUuid();
        $fileContentsAfter = AttachmentPublicContent::listing($attachmentPublicUuid)
            ->getValue();

        static::assertEquals($fileContentsBefore, $fileContentsAfter);
    }

    /**
     * @return string
     */
    private function getFileContentsOfAttachment(): string
    {
        $path = __DIR__ . self::PATH_ATTACHMENT . static::$attachmentPathIn;

        return FileUtil::getFileContents($path);
    }
}
