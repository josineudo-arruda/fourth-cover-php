class Book extends Info {
    private $id;
    private $title;
    private $isbn;
    private $author;
    private $publisher;

    public function __construct($id, $title, $isbn, $author, $publisher) {
        parent::__construct(
            '', // pages
            '', // releaseDate
            '', // language
            '', // publisher
            '', // dimensions
            ''  // targetAudience
        );
        
        $this->id = $id;
        $this->title = $title;
        $this->isbn = $isbn;
        $this->author = $author;
        $this->publisher = $publisher;
        $this->pages = $pages;
    }

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title; 
    }

    public function getIsbn() {
        return $this->isbn;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getPublisher() {
        return $this->publisher;
    }

    public function getPages() {
        return $this->pages;
    }

    public function setPages($pages) {
        $this->pages = $pages;
    }

    public function getReleaseDate() {
        return $this->releaseDate;
    }

    public function setReleaseDate($releaseDate) {
        $this->releaseDate = $releaseDate;
    }

    public function getLanguage() {
        return $this->language;
    }

    public function setLanguage($language) {
        $this->language = $language;
    }

    public function getDimensions() {
        return $this->dimensions;
    }

    public function setDimensions($dimensions) {
        $this->dimensions = $dimensions;
    }

    public function getTargetAudience() {
        return $this->targetAudience;
    }

    public function setTargetAudience($targetAudience) {
        $this->targetAudience = $targetAudience;
    }
}