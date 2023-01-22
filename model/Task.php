<?php

class Task
{
    private int $id;
    private string $description;
    private bool $isDone;
    private DateTime $dateCreated;

    public function __construct(string $description = '', bool $isDone = false)
    {
        $this->description = $description;
        $this->isDone = $isDone;
        $this->dateCreated = new DateTime();
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function isDone(): bool
    {
        return $this->isDone;
    }

    public function setIsDone(bool $isDone): void
    {
        $this->isDone = $isDone;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getDateCreated(): string {
		return $this->dateCreated->format('d.m.Y H:i:s');
	}
}