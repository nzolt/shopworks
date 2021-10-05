<?php

namespace App\Data\Models\Rotas;

use App\Data\Models\Shifts\ShiftCollection;
use App\Data\Models\Shifts\ShiftModel;
use App\Helpers\DateHelper;

class Rotas implements RotasInterface
{
    /**
     * @var int
     */
    protected $id = 0;

    /**
     * @var int
     */
    protected $shopId = 0;

    /**
     * @var \DateTime
     */
    protected $weekCommenceDate;

    /**
     * @var string
     */
    protected $createdAt = '';

    /**
     * @var string
     */
    protected $updatedAt = '';

    /**
     * @var ShiftCollection
     */
    protected $shifts = [];

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
    public function getShopId(): int
    {
        return $this->shopId;
    }

    /**
     * @param int $shopId
     */
    public function setShopId(int $shopId): void
    {
        $this->shopId = $shopId;
    }

    /**
     * @return \DateTime
     */
    public function getWeekCommenceDate(): \DateTime
    {
        return $this->weekCommenceDate;
    }

    /**
     * @param \DateTime $weekCommenceDate
     */
    public function setWeekCommenceDate(\DateTime $weekCommenceDate): void
    {
        $this->weekCommenceDate = $weekCommenceDate;
    }

    /**
     * @param ShiftCollection $shifts
     */
    public function setShifts(ShiftCollection $shifts): void
    {
        foreach ($shifts->__toArray() as $shift){
            $this->addShift($shift);
        }
    }

    /**
     * @param ShiftModel $shift
     */
    protected function addShift(ShiftModel $shift): void
    {
        if($this->getId() == $shift->getRotaId()) {
            $this->shifts[] = $shift;
        }
    }

    /**
     * @return array
     */
    public function getShifts(): array
    {
        return $this->shifts;
    }

    /**
     * @return int
     */
    public function getWeek(): int
    {
        return DateHelper::getWeek($this->getWeekCommenceDate());
    }
}