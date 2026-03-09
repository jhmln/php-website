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
    
    function __construct(
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
        
        $date = date_create_from_format("D, d M Y H:i:s e", $publicationDate, new \DateTimeZone("GMT"));
        
        if ($date) {
            $this->publicationDate = $date;
            $this->publicationDateUnix = $date->getTimestamp();
        }
        else {
            $this->publicationDate = null;
            $this->publicationDateUnix = 0;
        }
    }
}
?>