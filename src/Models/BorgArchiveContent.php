<?php

namespace Vdhicts\Cyberfusion\ClusterApi\Models;

use Vdhicts\Cyberfusion\ClusterApi\Enums\BorgArchiveObjectType;
use Vdhicts\Cyberfusion\ClusterApi\Support\Arr;
use Vdhicts\Cyberfusion\ClusterApi\Contracts\Model;
use Vdhicts\Cyberfusion\ClusterApi\Support\Validator;

class BorgArchiveContent extends ClusterModel implements Model
{
    private string $objectType;
    private string $symbolicMode;
    private string $username;
    private string $groupName;
    private ?string $path;
    private ?string $linkTarget;
    private string $modificationTime;
    private ?int $size;

    public function getObjectType(): string
    {
        return $this->objectType;
    }

    public function setObjectType(string $objectType): BorgArchiveContent
    {
        Validator::value($objectType)
            ->valueIn(BorgArchiveObjectType::AVAILABLE)
            ->validate();

        $this->objectType = $objectType;

        return $this;
    }

    public function getSymbolicMode(): string
    {
        return $this->symbolicMode;
    }

    public function setSymbolicMode(string $symbolicMode): BorgArchiveContent
    {
        $this->symbolicMode = $symbolicMode;

        return $this;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): BorgArchiveContent
    {
        $this->username = $username;

        return $this;
    }

    public function getGroupName(): string
    {
        return $this->groupName;
    }

    public function setGroupName(string $groupName): BorgArchiveContent
    {
        $this->groupName = $groupName;

        return $this;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(?string $path): BorgArchiveContent
    {
        $this->path = $path;

        return $this;
    }

    public function getLinkTarget(): ?string
    {
        return $this->linkTarget;
    }

    public function setLinkTarget(?string $linkTarget): BorgArchiveContent
    {
        $this->linkTarget = $linkTarget;

        return $this;
    }

    public function getModificationTime(): string
    {
        return $this->modificationTime;
    }

    public function setModificationTime(string $modificationTime): BorgArchiveContent
    {
        $this->modificationTime = $modificationTime;

        return $this;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(?int $size): BorgArchiveContent
    {
        $this->size = $size;

        return $this;
    }

    public function fromArray(array $data): BorgArchiveContent
    {
        return $this
            ->setObjectType(Arr::get($data, 'object_type'))
            ->setSymbolicMode(Arr::get($data, 'symbolic_mode'))
            ->setUsername(Arr::get($data, 'username'))
            ->setGroupName(Arr::get($data, 'group_name'))
            ->setPath(Arr::get($data, 'path'))
            ->setLinkTarget(Arr::get($data, 'link_target'))
            ->setModificationTime(Arr::get($data, 'modification_time'))
            ->setSize(Arr::get($data, 'size'));
    }

    public function toArray(): array
    {
        return [
            'object_type' => $this->getObjectType(),
            'symbolic_mode' => $this->getSymbolicMode(),
            'username' => $this->getUsername(),
            'group_name' => $this->getGroupName(),
            'path' => $this->getPath(),
            'link_target' => $this->getLinkTarget(),
            'modification_time' => $this->getModificationTime(),
            'size' => $this->getSize(),
        ];
    }
}
