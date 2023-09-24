class Publisher {
    private $id;
    private $name;
    private $address;
    private $books;
    
    public function __construct($id, $name, $address) {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->books = array();
    }

    public function addBook($book) {
        $this->books[] = $book;
    }

    public function getBooks() {
        return $this->books;
    }

    public function getId() {
        return $this->id;
    }

    public function getAddress() {
        return $this->address;
    }
}