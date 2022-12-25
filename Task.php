<?php
class Task
{
    private string $description;
    private DateTime $dateCreated;
    private DateTime $dateUpdated;
    private DateTime $dateDone;
    private int $priority = 0;
    private bool $isDone = false;
    private User $owner;
    private array $comments = [];
    
    public function __construct(string $description, User $owner)
    {
        $this->description = $description;
        $this->owner = $owner;
        $this->dateCreated = new DateTime();
    }
	public function getDateCreated(): string {
		return $this->dateCreated->format('d.m.Y H:i:s');
	}
	public function getIsDone(): bool {
		return $this->isDone;
	}
	public function setIsDone(bool $isDone): void {
		$this->isDone = $isDone;
	}

	public function getPriority(): int {
		return $this->priority;
	}
	public function setPriority(int $priority): void {
		$this->priority = $priority;
	}
	public function getDateUpdated(): DateTime {
		return $this->dateUpdated;
	}
	
	public function setDateUpdated(DateTime $dateUpdated): void {
		$this->dateUpdated = $dateUpdated;
	}
	public function getOwner(): User {
		return $this->owner;
	}
	public function setOwner(User $owner): void {
		$this->owner = $owner;
	}
	public function getDescription(): string {
		return $this->description;
	}
	public function setDescription(string $description): void {
		$this->description = $description;
        $this->dateUpdated = new DateTime();
	}
	public function getDateDone(): DateTime {
		return $this->dateDone;
	}
	public function setDateDone(DateTime $dateDone): void {
		$this->dateDone = $dateDone;
	}
    public function markAsDone(): void {
        $this->setDateUpdated(new DateTime());
        $this->setDateDone(new DateTime());
        $this->setIsDone(true);
    }
	public function getComents(): array {
		return $this->comments;
	}
	

	public function addComment(Comment $coments): void {
		$this->comments[] = $coments;
	}
}