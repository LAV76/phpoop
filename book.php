<?php
// 1. Придумайте класс, который описывает любую сущность из предметной области библиотеки: книга, шкаф, комната и т.п.

class Book {
    public string $title;
    public string $author;
    public int $year;
    public string $genre;

    public function __construct(string $title, string $author, int $year, string $genre) {
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
        $this->genre = $genre;
    }

    public function getDetails(): string {
        return "Название: {$this->title}, Автор: {$this->author}, Год: {$this->year}, Жанр: {$this->genre}";
    }
}

// 2. Опишите свойства классов из п.1 (состояние).

// Класс Book имеет следующие свойства:

// title — название книги.
// author — автор книги.
// year — год издания.
// genre — жанр книги.


// 3. Опишите поведение классов из п.1 (методы).

// Метод getDetails возвращает строку с подробной информацией о книге.


// 4. Придумайте наследников классов из п.1. Чем они будут отличаться?

class DigitalBook extends Book {
    public string $downloadLink;

    public function __construct(string $title, string $author, int $year, string $genre, string $downloadLink) {
        parent::__construct($title, $author, $year, $genre);
        $this->downloadLink = $downloadLink;
    }

    public function getOnHand(): string {
        return "Скачайте книгу по ссылке: {$this->downloadLink}";
    }
}

class PhysicalBook extends Book {
    public string $libraryLocation;

    public function __construct(string $title, string $author, int $year, string $genre, string $libraryLocation) {
        parent::__construct($title, $author, $year, $genre);
        $this->libraryLocation = $libraryLocation;
    }

    public function getOnHand(): string {
        return "Заберите книгу в библиотеке: {$this->libraryLocation}";
    }
}

// 5. Создайте структуру классов ведения книжной номенклатуры.
// — Есть абстрактная книга.
// — Есть цифровая книга, бумажная книга.
// — У каждой книги есть метод получения на руки.

abstract class Book {
    public string $title;
    public string $author;
    public int $year;
    public static int $readCount = 0;

    public function __construct(string $title, string $author, int $year) {
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
    }

    abstract public function getOnHand(): string;

    public function markAsRead(): void {
        self::$readCount++;
    }
}

class DigitalBook extends Book {
    public string $downloadLink;

    public function __construct(string $title, string $author, int $year, string $downloadLink) {
        parent::__construct($title, $author, $year);
        $this->downloadLink = $downloadLink;
    }

    public function getOnHand(): string {
        return "Скачайте книгу по ссылке: {$this->downloadLink}";
    }
}

class PhysicalBook extends Book {
    public string $libraryLocation;

    public function __construct(string $title, string $author, int $year, string $libraryLocation) {
        parent::__construct($title, $author, $year);
        $this->libraryLocation = $libraryLocation;
    }

    public function getOnHand(): string {
        return "Заберите книгу в библиотеке: {$this->libraryLocation}";
    }
}


// Что вынести в абстрактный класс?

// Свойства: title, author, year.
// Методы: markAsRead.
// Что унаследовать?

// Специфические методы (getOnHand) и свойства (downloadLink, libraryLocation).


// 6. Дан код:

// class A {
// public function foo() {
// static $x = 0;
// echo ++$x;
// }
// }
// $a1 = new A();
// $a2 = new A();
// $a1->foo();
// $a2->foo();
// $a1->foo();
// $a2->foo();

// Что он выведет на каждом шаге? Почему?

// $x — это статическая переменная. Она сохраняет свое значение между вызовами функции, но она 
// одна для всех объектов класса A. Поэтому инкрементируется каждый раз, когда вызывается метод foo на любом объекте.

// Немного изменим п.5

// class A {
// public function foo() {
// static $x = 0;
// echo ++$x;
// }
// }
// class B extends A {
// }
// $a1 = new A();
// $b1 = new B();
// $a1->foo();
// $b1->foo();
// $a1->foo();
// $b1->foo();

// Что он выведет теперь?

// 
