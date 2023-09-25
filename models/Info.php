class Info {
    private $numPages;
    private $releaseDate;
    private $language;
    private $publisher;
    private $dimensions;
    private $targetAudience;

    public function __construct(
        $numPages,
        $releaseDate,
        $language,
        $publisher,
        $dimensions,
        $targetAudience
    ) {
        $this->numPages = $numPages;
        $this->releaseDate = $releaseDate;
        $this->language = $language;
        $this->publisher = $publisher;
        $this->dimensions = $dimensions;
        $this->targetAudience = $targetAudience;
    }

    public function getNumPages() {
        return $this->numPages;
    }

    public function setNumPages($numPages) {
        $this->numPages = $numPages;
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

    public function getPublisher() {
        return $this->publisher;
    }

    public function setPublisher($publisher) {
        $this->publisher = $publisher;
    }
}
