<?php

namespace App\Data\Models\Shifts;

use App\Exceptions\InvalidDateException;
use App\Helpers\DateHelper;
use App\Validators\ShiftValidator;

abstract class ShiftModelAbstract
{
    /**
     * @var int
     */
    protected $id = 0;

    /**
     * @var int
     */
    protected $rotaId = 0;

    /**
     * @var int
     */
    protected $staffId = 0;

    /**
     * @var \DateTime
     */
    protected $startTime;

    /**
     * @var \DateTime
     */
    protected $endTime;

    /**
     * @var string
     */
    protected $createdAt = '';

    /**
     * @var string
     */
    protected $updatedAt = '';

    /**
     * @param int $id
     * @param int $rotaId
     * @param int $staffId
     * @param \DateTime $startTime
     * @param \DateTime $endTime
     * @throws InvalidDateException
     */
    public function __construct(int $id, int $rotaId, int $staffId, \DateTime $startTime, \DateTime $endTime)
    {
        if(ShiftValidator::ValidateShiftDates($startTime, $endTime)){
            $this->setId($id);
            $this->setRotaId($rotaId);
            $this->setStaffId($staffId);
            $this->setStartTime($startTime);
            $this->setEndTime($endTime);
        } else {
            throw new InvalidDateException();
        }
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getRotaId(): int
    {
        return $this->rotaId;
    }

    /**
     * @param int $rotaId
     */
    public function setRotaId(int $rotaId): void
    {
        $this->rotaId = $rotaId;
    }

    /**
     * @return int
     */
    public function getStaffId(): int
    {
        return $this->staffId;
    }

    /**
     * @param int $staffId
     */
    public function setStaffId(int $staffId): void
    {
        $this->staffId = $staffId;
    }

    /**
     * @return \DateTime
     */
    public function getStartTime(): \DateTime
    {
        return $this->startTime;
    }

    /**
     * @param \DateTime $startTime
     */
    public function setStartTime(\DateTime $startTime): void
    {
        $this->startTime = $startTime;
    }

    /**
     * @return \DateTime
     */
    public function getEndTime(): \DateTime
    {
        return $this->endTime;
    }

    /**
     * @param \DateTime $endTime
     */
    public function setEndTime(\DateTime $endTime): void
    {
        $this->endTime = $endTime;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * @param string $createdAt
     */
    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }

    /**
     * @param string $updatedAt
     */
    public function setUpdatedAt(string $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}