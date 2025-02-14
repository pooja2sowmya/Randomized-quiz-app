CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('student', 'admin') NOT NULL DEFAULT 'student',
    score INT DEFAULT 0,
    completion_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE questions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question TEXT NOT NULL,
    option1 VARCHAR(255) NOT NULL,
    option2 VARCHAR(255) NOT NULL,
    option3 VARCHAR(255) NOT NULL,
    option4 VARCHAR(255) NOT NULL,
    correct_answer VARCHAR(255) NOT NULL
);

INSERT INTO questions (question, option1, option2, option3, option4, correct_answer) VALUES
('What is the capital of Italy?', 'Rome', 'Paris', 'Madrid', 'Berlin', 'Rome'),
('Who wrote "Pride and Prejudice"?', 'Jane Austen', 'Charles Dickens', 'William Shakespeare', 'Emily Brontë', 'Jane Austen'),
('What is the chemical symbol for gold?', 'Au', 'Ag', 'Pt', 'Fe', 'Au'),
('Who is known as the "Father of Modern Physics"?', 'Albert Einstein', 'Isaac Newton', 'Nikola Tesla', 'Galileo Galilei', 'Albert Einstein'),
('What is the tallest mammal in the world?', 'Giraffe', 'Elephant', 'Hippopotamus', 'Rhino', 'Giraffe'),
('What is the largest ocean on Earth?', 'Pacific Ocean', 'Atlantic Ocean', 'Indian Ocean', 'Arctic Ocean', 'Pacific Ocean'),
('Who composed the music for the opera "The Barber of Seville"?', 'Gioachino Rossini', 'Wolfgang Amadeus Mozart', 'Ludwig van Beethoven', 'Giuseppe Verdi', 'Gioachino Rossini'),
('What is the capital of Brazil?', 'Brasília', 'Rio de Janeiro', 'São Paulo', 'Buenos Aires', 'Brasília'),
('What is the chemical symbol for iron?', 'Fe', 'Au', 'Ag', 'Pb', 'Fe'),
('Which planet is known as the "Morning Star" or "Evening Star"?', 'Venus', 'Mars', 'Jupiter', 'Mercury', 'Venus'),
('Who painted "Starry Night"?', 'Vincent van Gogh', 'Pablo Picasso', 'Leonardo da Vinci', 'Claude Monet', 'Vincent van Gogh'),
('What is the largest species of bear?', 'Polar Bear', 'Grizzly Bear', 'Kodiak Bear', 'Brown Bear', 'Polar Bear'),
('What is the tallest mountain in the world?', 'Mount Everest', 'K2', 'Kanchenjunga', 'Lhotse', 'Mount Everest'),
('Who invented the telephone?', 'Alexander Graham Bell', 'Thomas Edison', 'Nikola Tesla', 'Isaac Newton', 'Alexander Graham Bell'),
('What is the chemical symbol for sodium?', 'Na', 'H2O', 'CO2', 'O2', 'Na'),
('What is the capital of Japan?', 'Tokyo', 'Beijing', 'Seoul', 'Bangkok', 'Tokyo'),
('Who is the author of "1984"?', 'George Orwell', 'Aldous Huxley', 'Ray Bradbury', 'J.R.R. Tolkien', 'George Orwell'),
('Which country is home to the kangaroo?', 'Australia', 'Brazil', 'Canada', 'South Africa', 'Australia'),
('What is the chemical symbol for carbon?', 'C', 'Ca', 'Cr', 'Cu', 'C'),
('Who discovered gravity?', 'Isaac Newton', 'Albert Einstein', 'Galileo Galilei', 'Johannes Kepler', 'Isaac Newton'),
('What is the largest desert in the world?', 'Sahara Desert', 'Arabian Desert', 'Gobi Desert', 'Kalahari Desert', 'Sahara Desert'),
('Who is known as the "Father of Computers"?', 'Charles Babbage', 'Alan Turing', 'Bill Gates', 'Steve Jobs', 'Charles Babbage'),
('What is the fastest land animal?', 'Cheetah', 'Lion', 'Leopard', 'Tiger', 'Cheetah'),
('What is the chemical symbol for silver?', 'Ag', 'Au', 'Pt', 'Cu', 'Ag'),
('Who wrote "Romeo and Juliet"?', 'William Shakespeare', 'Jane Austen', 'Charles Dickens', 'Mark Twain', 'William Shakespeare'),
('Which country is known as the Land of the Midnight Sun?', 'Norway', 'Sweden', 'Finland', 'Denmark', 'Norway'),
('What is the chemical symbol for potassium?', 'K', 'S', 'P', 'Kp', 'K'),
('Who is credited with the theory of evolution by natural selection?', 'Charles Darwin', 'Gregor Mendel', 'Louis Pasteur', 'Albert Einstein', 'Charles Darwin'),
('What is the largest bird in the world?', 'Ostrich', 'Eagle', 'Albatross', 'Condor', 'Ostrich'),
('What is the chemical symbol for calcium?', 'Ca', 'Cu', 'Co', 'Cl', 'Ca'),
('Who discovered America?', 'Christopher Columbus', 'Vasco da Gama', 'Ferdinand Magellan', 'Marco Polo', 'Christopher Columbus'),
('What is the main ingredient in sushi?', 'Fish', 'Rice', 'Seaweed', 'Tofu', 'Rice'),
('What is the chemical symbol for nitrogen?', 'N', 'Ni', 'Na', 'Ne', 'N'),
('Who is known as the "Father of Medicine"?', 'Hippocrates', 'Galen', 'Avicenna', 'Louis Pasteur', 'Hippocrates'),
('What is the smallest planet in our solar system?', 'Mercury', 'Venus', 'Mars', 'Earth', 'Mercury'),
('Who is known as the "Father of Geometry"?', 'Euclid', 'Pythagoras', 'Archimedes', 'Aristotle', 'Euclid'),
('What is the chemical symbol for lead?', 'Pb', 'Fe', 'Cu', 'Ag', 'Pb'),
('What is the world''s largest mammal?', 'Blue Whale', 'African Elephant', 'Giraffe', 'Hippopotamus', 'Blue Whale'),
('What is the chemical symbol for oxygen?', 'O2', 'O', 'N2', 'H2O', 'O2'),
('Who was the first woman to win a Nobel Prize?', 'Marie Curie', 'Mother Teresa', 'Rosa Parks', 'Malala Yousafzai', 'Marie Curie'),
('What is the capital of India?', 'New Delhi', 'Mumbai', 'Kolkata', 'Chennai', 'New Delhi'),
('Who is the artist of the famous painting "The Scream"?', 'Edvard Munch', 'Pablo Picasso', 'Vincent van Gogh', 'Claude Monet', 'Edvard Munch'),
('What is the chemical symbol for hydrogen?', 'H', 'He', 'Ho', 'Hy', 'H'),
('What is the largest reptile in the world?', 'Saltwater Crocodile', 'Green Anaconda', 'Komodo Dragon', 'American Alligator', 'Saltwater Crocodile'),
('Who wrote "The Great Gatsby"?', 'F. Scott Fitzgerald', 'Ernest Hemingway', 'John Steinbeck', 'William Faulkner', 'F. Scott Fitzgerald'),
('What is the chemical symbol for helium?', 'He', 'H', 'Ho', 'Hy', 'He'),
('Who was the first man to walk on the moon?', 'Neil Armstrong', 'Buzz Aldrin', 'Yuri Gagarin', 'Alan Shepard', 'Neil Armstrong'),
('What is the largest continent by land area?', 'Asia', 'Africa', 'North America', 'South America', 'Asia'),
('What is the chemical symbol for uranium?', 'U', 'Un', 'Ur', 'Ul', 'U'),
('Who painted "The Last Supper"?', 'Leonardo da Vinci', 'Michelangelo', 'Raphael', 'Donatello', 'Leonardo da Vinci'),
('What is the chemical symbol for mercury?', 'Hg', 'Mg', 'Ag', 'Cn', 'Hg'),
('Who is known as the "Father of Biology"?', 'Aristotle', 'Charles Darwin', 'Gregor Mendel', 'Carl Linnaeus', 'Aristotle'),
('What is the smallest bone in the human body?', 'Stapes', 'Incus', 'Malleus', 'Hyoid', 'Stapes'),
('What is the chemical symbol for silver?', 'Ag', 'Au', 'Pt', 'Cu', 'Ag'),
('Who is the author of "The Catcher in the Rye"?', 'J.D. Salinger', 'Ernest Hemingway', 'F. Scott Fitzgerald', 'Mark Twain', 'J.D. Salinger'),
('What is the chemical symbol for phosphorus?', 'P', 'Ph', 'Ps', 'Po', 'P'),
('Who is known as the "Father of Chemistry"?', 'Antoine Lavoisier', 'Dmitri Mendeleev', 'Robert Boyle', 'John Dalton', 'Antoine Lavoisier'),
('What is the chemical symbol for tin?', 'Sn', 'Ti', 'Te', 'Tn', 'Sn'),
('Who painted "The Persistence of Memory"?', 'Salvador Dalí', 'Pablo Picasso', 'Vincent van Gogh', 'Claude Monet', 'Salvador Dalí'),
('What is the chemical symbol for silicon?', 'Si', 'Sn', 'Se', 'S', 'Si'),
('Who is known as the "Father of Electricity"?', 'Michael Faraday', 'Benjamin Franklin', 'Thomas Edison', 'Nikola Tesla', 'Michael Faraday'),
('What is the largest moon in the solar system?', 'Ganymede', 'Titan', 'Callisto', 'Io', 'Ganymede'),
('What is the chemical symbol for cobalt?', 'Co', 'Cb', 'Ct', 'Cn', 'Co'),
('Who wrote "War and Peace"?', 'Leo Tolstoy', 'Fyodor Dostoevsky', 'Anton Chekhov', 'Ivan Turgenev', 'Leo Tolstoy'),
('What is the chemical symbol for arsenic?', 'As', 'Ar', 'An', 'At', 'As'),
('Who is known as the "Father of the Internet"?', 'Tim Berners-Lee', 'Al Gore', 'Bill Gates', 'Steve Jobs', 'Tim Berners-Lee'),
('What is the largest species of shark?', 'Whale Shark', 'Great White Shark', 'Hammerhead Shark', 'Tiger Shark', 'Whale Shark'),
('What is the chemical symbol for neon?', 'Ne', 'N', 'Na', 'No', 'Ne'),
('Who is the author of "Moby-Dick"?', 'Herman Melville', 'Nathaniel Hawthorne', 'Edgar Allan Poe', 'Mark Twain', 'Herman Melville'),
('What is the chemical symbol for zinc?', 'Zn', 'Zi', 'Zc', 'Zd', 'Zn'),
('Who is known as the "Father of Psychoanalysis"?', 'Sigmund Freud', 'Carl Jung', 'Ivan Pavlov', 'B.F. Skinner', 'Sigmund Freud'),
('What is the chemical symbol for radium?', 'Ra', 'Rd', 'Rm', 'Rn', 'Ra'),
('Who painted "Guernica"?', 'Pablo Picasso', 'Salvador Dalí', 'Vincent van Gogh', 'Claude Monet', 'Pablo Picasso'),
('What is the chemical symbol for bromine?', 'Br', 'Be', 'Bo', 'Bn', 'Br'),
('Who is known as the "Father of Medicine"?', 'Hippocrates', 'Galen', 'Avicenna', 'Louis Pasteur', 'Hippocrates'),
('What is the chemical symbol for xenon?', 'Xe', 'Xn', 'Xa', 'Xy', 'Xe'),
('Who wrote "The Odyssey"?', 'Homer', 'Virgil', 'Sophocles', 'Aeschylus', 'Homer'),
('What is the chemical symbol for krypton?', 'Kr', 'Kp', 'Kn', 'Kt', 'Kr'),
('Who is known as the "Father of Geometry"?', 'Euclid', 'Pythagoras', 'Archimedes', 'Aristotle', 'Euclid'),
('What is the chemical symbol for tungsten?', 'W', 'Tn', 'Tu', 'Tg', 'W'),
('Who painted "The Birth of Venus"?', 'Sandro Botticelli', 'Raphael', 'Michelangelo', 'Leonardo da Vinci', 'Sandro Botticelli'),
('What is the chemical symbol for vanadium?', 'V', 'Va', 'Vd', 'Vm', 'V'),
('Who is credited with the invention of the World Wide Web?', 'Tim Berners-Lee', 'Al Gore', 'Bill Gates', 'Steve Jobs', 'Tim Berners-Lee');


ALTER TABLE users ADD COLUMN is_admin BOOLEAN DEFAULT 0;

INSERT INTO users (username, password, is_admin) VALUES ('admin', 'adminpass123', 1);

INSERT INTO users (username, password, role, is_admin) VALUES
('student1', 'password1', 'student', 0),
('student2', 'password2', 'student', 0),
('admin1', 'adminpassword', 'admin', 1);
CREATE TABLE quiz_marks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    marks INT NOT NULL,
    completion_time DATETIME NOT NULL
);
