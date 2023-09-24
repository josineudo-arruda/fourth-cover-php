class Author {
    private $id;
    private $firstName;
    private $lastName;
    private $birthdate;
    private $books; // Lista de livros escritos pelo autor

    public function __construct($id, $firstName, $lastName, $birthdate) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birthdate = $birthdate;
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

    public function getBirthdate() {
        return $this->birthdate;
    }

    public function setBirthdate($birthdate) {
        $this->birthdate = $birthdate;
    }

    public function getFullName() {
        return $this->firstName . ' ' . $this->lastName;
    }
}