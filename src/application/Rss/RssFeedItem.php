<?php
namespace Rss;

class RssFeedItem {
    readonly string $source;
    readonly string $sourceLink;
    readonly string $title;
    readonly string $link;
    readonly string $description;
    readonly string $guid;
    readonly ?\DateTime $publicationDate;
    readonly int $publicationDateUnix;
    
    public function __construct(
        string $source,
        string $sourceLink,
        string $title,
        string $link,
        string $description,
        string $guid,
        string $publicationDate
    ) {
        $this->source = $source;
        $this->sourceLink = $sourceLink;
        $this->title = $title;
        $this->link = $link;
        $this->description = $description;
        $this->guid = $guid;        
        
        $timestamp = strtotime($publicationDate);
        
        if ($timestamp !== false) {
            $this->publicationDate = (new \DateTime())->setTimestamp($timestamp);
            $this->publicationDateUnix = $timestamp;
        }
        else {
            $this->publicationDate = null;
            $this->publicationDateUnix = 0;
        }
    }
}
?>