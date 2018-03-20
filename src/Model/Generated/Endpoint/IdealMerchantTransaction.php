<?php
namespace bunq\Model\Generated\Endpoint;

use bunq\Http\ApiClient;
use bunq\Model\Core\BunqModel;
use bunq\Model\Generated\Object\Amount;
use bunq\Model\Generated\Object\LabelMonetaryAccount;

/**
 * View for requesting iDEAL transactions and polling their status.
 *
 * @generated
 */
class IdealMerchantTransaction extends BunqModel
{
    /**
     * Endpoint constants.
     */
    const ENDPOINT_URL_CREATE = 'user/%s/monetary-account/%s/ideal-merchant-transaction';
    const ENDPOINT_URL_READ = 'user/%s/monetary-account/%s/ideal-merchant-transaction/%s';
    const ENDPOINT_URL_LISTING = 'user/%s/monetary-account/%s/ideal-merchant-transaction';

    /**
     * Field constants.
     */
    const FIELD_AMOUNT_REQUESTED = 'amount_requested';
    const FIELD_ISSUER = 'issuer';
    const FIELD_CALLBACK_TYPE = 'callback_type';

    /**
     * Object type.
     */
    const OBJECT_TYPE_GET = 'IdealMerchantTransaction';

    /**
     * The id of the monetary account this ideal merchant transaction links to.
     *
     * @var int
     */
    protected $monetaryAccountId;

    /**
     * The alias of the monetary account to add money to.
     *
     * @var LabelMonetaryAccount
     */
    protected $alias;

    /**
     * The alias of the monetary account the money comes from.
     *
     * @var LabelMonetaryAccount
     */
    protected $counterpartyAlias;

    /**
     * In case of a successful transaction, the amount of money that will be
     * transferred.
     *
     * @var Amount
     */
    protected $amountGuaranteed;

    /**
     * The requested amount of money to add.
     *
     * @var Amount
     */
    protected $amountRequested;

    /**
     * When the transaction will expire.
     *
     * @var string
     */
    protected $expiration;

    /**
     * The BIC of the issuer.
     *
     * @var string
     */
    protected $issuer;

    /**
     * The Name of the issuer.
     *
     * @var string
     */
    protected $issuerName;

    /**
     * The URL to visit to
     *
     * @var string
     */
    protected $issuerAuthenticationUrl;

    /**
     * The 'purchase ID' of the iDEAL transaction.
     *
     * @var string
     */
    protected $purchaseIdentifier;

    /**
     * The status of the transaction.
     *
     * @var string
     */
    protected $status;

    /**
     * When the status was last updated.
     *
     * @var string
     */
    protected $statusTimestamp;

    /**
     * The 'transaction ID' of the iDEAL transaction.
     *
     * @var string
     */
    protected $transactionIdentifier;

    /**
     * Whether or not chat messages are allowed.
     *
     * @var bool
     */
    protected $allowChat;

    /**
     * @param Amount $amountRequested The requested amount of money to add.
     * @param string $issuer          The BIC of the issuing bank to ask for money.
     * @param int|null $monetaryAccountId
     * @param string[] $customHeaders
     *
     * @return BunqResponseInt
     */
    public static function create(
        Amount $amountRequested,
        string $issuer,
        int $monetaryAccountId = null,
        array $customHeaders = []
    ): BunqResponseInt {
        $apiClient = new ApiClient(static::getApiContext());
        $responseRaw = $apiClient->post(
            vsprintf(
                self::ENDPOINT_URL_CREATE,
                [static::determineUserId(), static::determineMonetaryAccountId($monetaryAccountId)]
            ),
            [
                self::FIELD_AMOUNT_REQUESTED => $amountRequested,
                self::FIELD_ISSUER => $issuer,
            ],
            $customHeaders
        );

        return BunqResponseInt::castFromBunqResponse(
            static::processForId($responseRaw)
        );
    }

    /**
     * @param int $idealMerchantTransactionId
     * @param int|null $monetaryAccountId
     * @param string[] $customHeaders
     *
     * @return BunqResponseIdealMerchantTransaction
     */
    public static function get(
        int $idealMerchantTransactionId,
        int $monetaryAccountId = null,
        array $customHeaders = []
    ): BunqResponseIdealMerchantTransaction {
        $apiClient = new ApiClient(static::getApiContext());
        $responseRaw = $apiClient->get(
            vsprintf(
                self::ENDPOINT_URL_READ,
                [
                    static::determineUserId(),
                    static::determineMonetaryAccountId($monetaryAccountId),
                    $idealMerchantTransactionId,
                ]
            ),
            [],
            $customHeaders
        );

        return BunqResponseIdealMerchantTransaction::castFromBunqResponse(
            static::fromJson($responseRaw, self::OBJECT_TYPE_GET)
        );
    }

    /**
     * This method is called "listing" because "list" is a restricted PHP word
     * and cannot be used as constants, class names, function or method names.
     *
     * @param int|null $monetaryAccountId
     * @param string[] $params
     * @param string[] $customHeaders
     *
     * @return BunqResponseIdealMerchantTransactionList
     */
    public static function listing(
        int $monetaryAccountId = null,
        array $params = [],
        array $customHeaders = []
    ): BunqResponseIdealMerchantTransactionList {
        $apiClient = new ApiClient(static::getApiContext());
        $responseRaw = $apiClient->get(
            vsprintf(
                self::ENDPOINT_URL_LISTING,
                [static::determineUserId(), static::determineMonetaryAccountId($monetaryAccountId)]
            ),
            $params,
            $customHeaders
        );

        return BunqResponseIdealMerchantTransactionList::castFromBunqResponse(
            static::fromJsonList($responseRaw, self::OBJECT_TYPE_GET)
        );
    }

    /**
     * The id of the monetary account this ideal merchant transaction links to.
     *
     * @return int
     */
    public function getMonetaryAccountId()
    {
        return $this->monetaryAccountId;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param int $monetaryAccountId
     */
    public function setMonetaryAccountId($monetaryAccountId)
    {
        $this->monetaryAccountId = $monetaryAccountId;
    }

    /**
     * The alias of the monetary account to add money to.
     *
     * @return LabelMonetaryAccount
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param LabelMonetaryAccount $alias
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;
    }

    /**
     * The alias of the monetary account the money comes from.
     *
     * @return LabelMonetaryAccount
     */
    public function getCounterpartyAlias()
    {
        return $this->counterpartyAlias;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param LabelMonetaryAccount $counterpartyAlias
     */
    public function setCounterpartyAlias($counterpartyAlias)
    {
        $this->counterpartyAlias = $counterpartyAlias;
    }

    /**
     * In case of a successful transaction, the amount of money that will be
     * transferred.
     *
     * @return Amount
     */
    public function getAmountGuaranteed()
    {
        return $this->amountGuaranteed;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param Amount $amountGuaranteed
     */
    public function setAmountGuaranteed($amountGuaranteed)
    {
        $this->amountGuaranteed = $amountGuaranteed;
    }

    /**
     * The requested amount of money to add.
     *
     * @return Amount
     */
    public function getAmountRequested()
    {
        return $this->amountRequested;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param Amount $amountRequested
     */
    public function setAmountRequested($amountRequested)
    {
        $this->amountRequested = $amountRequested;
    }

    /**
     * When the transaction will expire.
     *
     * @return string
     */
    public function getExpiration()
    {
        return $this->expiration;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param string $expiration
     */
    public function setExpiration($expiration)
    {
        $this->expiration = $expiration;
    }

    /**
     * The BIC of the issuer.
     *
     * @return string
     */
    public function getIssuer()
    {
        return $this->issuer;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param string $issuer
     */
    public function setIssuer($issuer)
    {
        $this->issuer = $issuer;
    }

    /**
     * The Name of the issuer.
     *
     * @return string
     */
    public function getIssuerName()
    {
        return $this->issuerName;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param string $issuerName
     */
    public function setIssuerName($issuerName)
    {
        $this->issuerName = $issuerName;
    }

    /**
     * The URL to visit to
     *
     * @return string
     */
    public function getIssuerAuthenticationUrl()
    {
        return $this->issuerAuthenticationUrl;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param string $issuerAuthenticationUrl
     */
    public function setIssuerAuthenticationUrl($issuerAuthenticationUrl)
    {
        $this->issuerAuthenticationUrl = $issuerAuthenticationUrl;
    }

    /**
     * The 'purchase ID' of the iDEAL transaction.
     *
     * @return string
     */
    public function getPurchaseIdentifier()
    {
        return $this->purchaseIdentifier;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param string $purchaseIdentifier
     */
    public function setPurchaseIdentifier($purchaseIdentifier)
    {
        $this->purchaseIdentifier = $purchaseIdentifier;
    }

    /**
     * The status of the transaction.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * When the status was last updated.
     *
     * @return string
     */
    public function getStatusTimestamp()
    {
        return $this->statusTimestamp;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param string $statusTimestamp
     */
    public function setStatusTimestamp($statusTimestamp)
    {
        $this->statusTimestamp = $statusTimestamp;
    }

    /**
     * The 'transaction ID' of the iDEAL transaction.
     *
     * @return string
     */
    public function getTransactionIdentifier()
    {
        return $this->transactionIdentifier;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param string $transactionIdentifier
     */
    public function setTransactionIdentifier($transactionIdentifier)
    {
        $this->transactionIdentifier = $transactionIdentifier;
    }

    /**
     * Whether or not chat messages are allowed.
     *
     * @return bool
     */
    public function getAllowChat()
    {
        return $this->allowChat;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param bool $allowChat
     */
    public function setAllowChat($allowChat)
    {
        $this->allowChat = $allowChat;
    }

    /**
     * @return bool
     */
    public function isAllFieldNull()
    {
        if (!is_null($this->monetaryAccountId)) {
            return false;
        }

        if (!is_null($this->alias)) {
            return false;
        }

        if (!is_null($this->counterpartyAlias)) {
            return false;
        }

        if (!is_null($this->amountGuaranteed)) {
            return false;
        }

        if (!is_null($this->amountRequested)) {
            return false;
        }

        if (!is_null($this->expiration)) {
            return false;
        }

        if (!is_null($this->issuer)) {
            return false;
        }

        if (!is_null($this->issuerName)) {
            return false;
        }

        if (!is_null($this->issuerAuthenticationUrl)) {
            return false;
        }

        if (!is_null($this->purchaseIdentifier)) {
            return false;
        }

        if (!is_null($this->status)) {
            return false;
        }

        if (!is_null($this->statusTimestamp)) {
            return false;
        }

        if (!is_null($this->transactionIdentifier)) {
            return false;
        }

        if (!is_null($this->allowChat)) {
            return false;
        }

        return true;
    }
}
