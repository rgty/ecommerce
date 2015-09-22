-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 22, 2015 at 10:30 PM
-- Server version: 5.6.25-0ubuntu0.15.04.1
-- PHP Version: 5.6.4-4ubuntu6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `Email` varchar(65) NOT NULL,
  `Address` varchar(650) NOT NULL,
  `User` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`Email`, `Address`, `User`) VALUES
('admin@acolyte.inc', 'shirisha getty,laskar bazar,hanamkonda,warangal,telangana,,506001', 'admin'),
('admin@acolyte.inc', 'Arun Kumar,# 5-7-7,Laskar Bazar,Hanamkonda,Telangana,,506001', 'admin'),
('admin@acolyte.inc', 'Arun Getty,# 5-7-7,Laskar Bazar,Hanamkonda,Telangana,,506001', 'admin'),
('admin@acolyte.inc', 'Arun Getty,# 5-7-7,Laskar Bazar,Hanamkonda,Telangana,,506001', 'admin'),
('admin@acolyte.inc', 'Raghu Getty,# 5-7-7,Laskar Bazar,Hanamkonda,Telangana,,506001', 'admin'),
('admin@acolyte.inc', 'Arun Getty,# 5-7-7,Laskar Bazar,Hanamkonda,Telangana,,506001', 'admin'),
('rgetty6@gmail.com', 'Shirisha Getty,# 5-7-7,Laskar Bazar,Hanamkonda,Telangana,,506001', 'rgetty'),
('admin@acolyte.inc', 'Arun Getty,# 5-7-7,Laskar Bazar,Hanamkonda,Telangana,,506001', 'admin'),
('rgetty6@gmail.com', 'Raghu Getty,# 5-7-7,Laskar Bazar,Hanamkonda,Telangana,,506001', 'rgetty'),
('admin@acolyte.inc', 'Raghu Getty,# 5-7-7,Laskar Bazar,Hanamkonda,Telangana,,506001', 'admin'),
('admin@acolyte.inc', 'Raghu Getty,# 5-7-7,Laskar Bazar,Hanamkonda,Telangana,,506001', 'admin'),
('admin@acolyte.inc', 'Raghu Getty,# 5-7-7,Laskar Bazar,Hanamkonda,Telangana,,506001', 'admin'),
('admin@acolyte.inc', 'Raghu Getty,# 5-7-7,Laskar Bazar,Hanamkonda,Telangana,,506001', 'admin'),
('rgetty6@gmail.com', 'Raghu Getty,# 5-7-7,Laskar Bazar,Hanamkonda,Telangana,,506001', 'rgetty'),
('admin@acolyte.inc', 'Raghu Getty,# 5-7-7,Laskar Bazar,Hanamkonda,Telangana,,506001', 'admin'),
('rgetty6@gmail.com', 'Raghu Getty,# 5-7-7,Laskar Bazar,Hanamkonda,Telangana,,506001', 'rgetty');

-- --------------------------------------------------------

--
-- Table structure for table `old_book_details`
--

CREATE TABLE IF NOT EXISTS `old_book_details` (
  `ISBN` varchar(13) NOT NULL DEFAULT '',
  `Author` varchar(100) NOT NULL,
  `Book_Name` varchar(150) NOT NULL,
  `Category` varchar(30) DEFAULT NULL,
  `Cost` double DEFAULT NULL,
  `Date` date NOT NULL,
  `Description` varchar(1000) DEFAULT 'None mentioned.',
  `Rate` int(1) NOT NULL,
  `URL` varchar(100) NOT NULL,
  `User` varchar(20) NOT NULL,
  `Warehouse` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `old_book_details`
--

INSERT INTO `old_book_details` (`ISBN`, `Author`, `Book_Name`, `Category`, `Cost`, `Date`, `Description`, `Rate`, `URL`, `User`, `Warehouse`) VALUES
('131234567890', 'Andrew S. Tanenbaum', 'Computer Networks', 'Computers / Technology', 450, '0000-00-00', 'Primarily intended for junior/senior or graduate level courses in computer networks, data networks, or distributed processing in CS or EE departments. Also useful (with selective omission of sections or chapters) for less advanced students. This is the first book that explains how computer networks work inside, from the hardware technology up to and including the most popular Internet application protocols. While students are not expected to have a background in computer networks or advanced mathematics, a general background in computer systems and programming is assumed.', 5, '1.jpg', 'shashank111', ''),
('4865442123623', 'Stephen King', 'Pet Sematary', 'Comics / Novels', 1200, '0000-00-00', 'Stephen King extraordinary novel', 4, 'SK_PS.jpg', 'rgetty', ''),
('978-006230123', 'Ashlee Vance', 'Elon Musk: Tesla, SpaceX, and the Quest for a Fantastic Future', 'Biographies / Memoirs', 1260, '0000-00-00', ' Vance uses Musks story to explore one of the pressing questions of our time: can the nation of inventors and creators which led the modern world for a century still compete in an age of fierce global competition? He argues that Musk--one of the most unusual and striking figures in American business history--is a contemporary amalgam of legendary inventors and industrialists like Thomas Edison, Henry Ford, Howard Hughes, and Steve Jobs. More than any other entrepreneur today, Musk has dedicated his energies and his own vast fortune to inventing a future that is as rich and far-reaching as the visionaries of the golden age of science-fiction fantasy.', 5, '978-006230123.jpg', 'rgetty', ''),
('978-006236928', 'Peter Schweizer', 'Clinton Cash: The Untold Story of How and Why Foreign Governments and Businesses Helped Make Bill and Hillary Rich', 'Politics / Government', 1020, '0000-00-00', 'n 2000, Bill and Hillary Clinton owed millions of dollars in legal debt. Since then, theyâ€™ve earned over $130 million. Where did the money come from? Most people assume that the Clintons amassed their wealth through lucrative book deals and high-six figure fees for speaking gigs. Now, Peter Schweizer shows who is really behind those enormous payments.', 3, '978-006236928.jpg', 'rgetty', ''),
('978-0133499', 'Andrew S. Tanenbaum ', 'Computer Networks', 'Computers / Technology', 250, '0000-00-00', 'Primarily intended for junior/senior or graduate level courses in computer networks, data networks, or distributed processing in CS or EE departments. Also useful (with selective omission of sections or chapters) for less advanced students. This is the first book that explains how computer networks work inside, from the hardware technology up to and including the most popular Internet application protocols. While students are not expected to have a background in computer networks or advanced mathematics, a general background in computer systems and programming is assumed.', 5, 'Computer_Networks.jpg', 'trash', ''),
('978-020144099', 'Matt Bishop', 'Computer Security: Art and Science', 'Computers / Technology', 3000, '0000-00-00', 'The importance of computer security has increased dramatically during the past few years. Bishop provides a monumental reference for the theory and practice of computer security. This is a textbook intended for use at the advanced undergraduate and introductory graduate levels, non-University training courses, as well as reference and self-study for security professionals. ', 5, 'CS_MB.jpg', 'admin', ''),
('978-030747573', 'Markus Zusak', 'The Book Theif', 'Literature / Fiction', 720, '0000-00-00', 'Liesel Meminger, a young German girl growing up in Nazi Germany, is the star of the show. She is also the chief book thief in the novel, which is narrated by Death. When Liesel foster parents decide to give refuge to a young Jewish man hiding from the Nazi regime, the characters grow and change in horrible and beautiful ways.', 5, '978-030747573.jpg', 'admin', ''),
('978-031335916', 'Richard L. Harris', 'Che Guevara: A Biography (Greenwood Biographies)', 'Biographies / Memoirs', 2000, '0000-00-00', 'Che Guevara is one of the most controversial and iconic figures in recent memory and is still a hero to many. Che Guevara: A Biography provides a balanced and engaging introduction to the famous revolutionary leader. Based on original research, the biography reveals how his early life prepared him for leadership in the Cuban Revolution. It also explores his revolutionary activities in Africa and Bolivia, as well as the circumstances surrounding his tragic death on October 9, 1967', 4, 'CG_RLH.jpg', 'admin', ''),
('978-03133810', 'Bob Batchelor', 'Bob Dylan: A Biography (Greenwood Biographies)', 'Biographies / Memoirs', 1200, '0000-00-00', 'In this thematically organized biography, cultural historian and prolific biographer Bob Batchelor examines one of the most important yet elusive figures in modern history. Rather than taking an exhaustive and cumbersome chronological approach to Bob Dylans 50-plus year career, the author focuses on the most significant aspects of his life and accomplishments.', 5, 'BD_BB.jpg', 'admin', ''),
('978-03163343', 'Kate Mulgrew', 'Born with Teeth: A Memoir', 'Biographies / Memoirs', 1080, '0000-00-00', 'Raised by unconventional Irish Catholics who knew "how to drink, how to dance, how to talk, and how to stir up the devil," Kate Mulgrew grew up with poetry and drama in her bones. But in her mother, a would-be artist burdened by the endless arrival of new babies, young Kate saw the consequences of a dream deferred. Determined to pursue her own no matter the cost, at 18 she left her small Midwestern town for New York, where, studying with the legendary Stella Adler, she learned the lesson that would define her as an actress: "Use it," Adler told her. Whatever disappointment, pain, or anger life throws in your path, channel it into the work.', 3, '978-03163343.jpg', 'rgetty', ''),
('978-047054664', 'Geraldine Woods', 'English Grammar For Dummies', 'Dummies', 780, '0000-00-00', 'Enhancing your speaking and writing skills helps in everyday situations, such as writing a paper for school, giving a presentation to a companys bigwigs, or communicating effectively with family and friends. English Grammar For Dummies, 2nd Edition gives you the latest techniques for improving your efficiency with English grammar and punctuation.', 5, '978-047054664.jpg', 'rgetty', ''),
('978-052542765', 'Amanda Berry and  Gina DeJesus', 'Hope: A Memoir of Survival in Cleveland', 'Biographies / Memoirs', 1000, '0000-00-00', 'Two women kidnapped by infamous Cleveland school-bus driver Ariel Castro share the stories of their abductions, captivity, and dramatic escape', 4, '978-052542765.jpg', 'rgetty', ''),
('978-054460971', 'Melissa Hartwig', 'The Whole30: The 30-Day Guide to Total Health and Food Freedom', 'Health / Medicine', 1500, '0000-00-00', 'Millions of people visit Whole30.com every month and share their stories of weight loss and lifestyle makeovers. Hundreds of thousands of them have read It Starts With Food, which explains the science behind the program. At last, The Whole30 provides the step-by-step, recipe-by-recipe guidebook that will allow millions of people to experience the transformation of their entire life in just one month.\r\n', 3, '978-054460971.jpg', 'rgetty', ''),
('978-074326474', 'Walter Isaacson', 'Einstein: His Life and Universe', 'Biographies / Memoirs', 660, '0000-00-00', 'By the author of the acclaimed bestsellers Benjamin Franklin and Steve Jobs, this is the definitive biography of Albert Einstein. \r\n\r\nHow did his mind work? What made him a genius? Isaacson biography shows how his scientific imagination sprang from the rebellious nature of his personality. His fascinating story is a testament to the connection between creativity and freedom.\r\n', 5, '978-074326474.jpg', 'rgetty', ''),
('978-078974253', 'Michael Miller', 'Absolute Beginners Guide to Computer Basics', 'Computers / Technology', 750, '0000-00-00', 'The best-selling beginners guide, now completely updated for Windows 7 and todays most popular Internet tools - including Facebook, craigslist, Twitter, and Wikipedia', 4, 'Computer_Basics.jpg', 'admin', ''),
('978-082254920', 'Carol Dommermuth-Costa', 'Nikola Tesla: A Spark of Genius (Lerner Biographies)', 'Biographies / Memoirs', 60, '0000-00-00', 'Book by Dommermuth-Costa, Carol, Demmermuth-Costa, Carol Dommermuth-Costa', 5, 'NK_CDC.jpg', 'admin', ''),
('978-111808372', 'Eric Tyson and Jim Schell', 'Small Business For Dummies', 'Dummies', 1000, '0000-00-00', 'The leading resource for starting and running any small business\r\nWant to start the small business of your dreams? Want to breathe new life into the one you already have? Small Business For Dummies provides authoritative guidance on every aspect of starting and growing your business, from financing and budgeting to marketing, management and beyond.\r\n\r\nThis completely practical, no-nonsense guide gives you expert advice on everything from generating ideas and locating start-up money to hiring the right people, balancing the books, and planning for growth. You will get plenty of help in ramping up your management skills, developing a marketing strategy, keeping your customers loyal, and much more. You will also find out to use the latest technology to improve your business performance at every level.', 4, '978-111808372.jpg', 'rgetty', ''),
('978-125003379', 'Bill Kreutzmann', 'Deal: My Three Decades of Drumming, Dreams, and Drugs with the Grateful Dead ', 'Arts / Photography', 1080, '0000-00-00', 'The Grateful Dead are perhaps the most legendary American rock band of all time. For thirty years, beginning in the hippie scene of San Francisco in 1965, they were a musical institution, the original jam band that broke new ground in so many ways. From the music to their live concert sound systems and fan recordings, they were forward-thinking champions of artistic control and outlaw artists who marched to the beat of their own drums.', 3, '978-125003379.jpg', 'rgetty', ''),
('978-14003134', 'Beth Nimmo', 'Rachels Tears', 'Spiritual', 0, '0000-00-00', '"I am not going to apologize for speaking the name of Jesus . . . If I have to sacrifice everything . . . I will." –Rachel Scott', 0, 'Rachels_Tears.jpg', 'admin', ''),
('978-140273229', 'Martin Woodside', 'Sterling Biographies: Thomas Edison: The Man Who Lit Up the World', 'Biographies / Memoirs', 240, '0000-00-00', 'The most certain way to succeed is always to try just one more time. That was Thomas Edison’s philosophy, and it led him to create the incandescent light bulb and illuminate the world with electricity. But that was just one of the many groundbreaking inventions Edison devised, many of which changed the shape of entertainment, industry, and everyday life. Meet the Wizard of Menlo Park, and see how he grew from a lonely, inquisitive boy who carried out experiments in his basement to the smart, enterprising, and imaginative inventor who gave us the stock market ticker, helped develop the phonograph and cinema, and even came up with the first storage battery and electric car', 0, 'TE_MW.jpg', 'admin', ''),
('978-141096242', ' Kay Barnham', 'Isaac Newton (Science Biographies)', 'Biographies / Memoirs', 1500, '0000-00-00', 'This book traces the life of Isaac Newton, from his early childhood and education through his sources of inspiration and challenges faced, early successes, and the work on gravity and light for which he is best known. A timeline at the end of the book summarizes key milestones and achievements of Newtons life.', 0, 'IN_KB.jpg', 'admin', ''),
('978-143296464', 'Elizabeth Raum', 'Abraham Lincoln (American Biographies)', 'Biographies / Memoirs', 1500, '0000-00-00', '', 0, 'AL_ER.jpg', 'admin', ''),
('978-144080100', 'Kimberly Dillon Summers', 'Katy Perry: A Biography (Greenwood Biographies)', 'Biographies / Memoirs', 3000, '0000-00-00', 'Katy Perry: A Biography examines who the young woman behind the hit songs, explicit lyrics, racy album covers, unconventional dress, and sometimes odd behavior really is. Through this nine-chapter narration of Perrys life, readers will gain insight into all stages of her development as a person and as a performer, from her early childhood, to her attempts to break out within the Christian music genre, to her pop music stardom and acting career', 0, 'KP_KDS.jpg', 'admin', ''),
('978-144242233', 'Rachel RenÃ©e Russell', 'Dork Diaries 3 1/2: How to Dork Your Diary', 'Children', 540, '2015-06-04', 'Nikki Maxwell has been writing in a diary since the start of the school year, and she usually takes it everywhere she goes--so she cannot believe it when one morning she cannot find her diary! The hunt is on, and while she looks, pursuing various theories about where it could be, Nikki cannot help putting together a list of important diary-keeping lessons to remember in case of missing diary emergencies like this one.', 0, '978-144242233.jpg', 'trash', 'false'),
('978-144967284', 'Nell Dale', 'Computer Science Illuminated-5th Edition', 'Computers / Technology', 5000, '0000-00-00', 'Revised and updated with the latest information in the field, the Fifth Edition of best-selling Computer Science Illuminated continues to provide students with an engaging breadth-first overview of computer science principles and provides a solid foundation for those continuing their study in this dynamic and exciting discipline.', 0, 'CS_ND.jpg', 'admin', ''),
('978-145558490', 'Dana Perino', 'And the Good News Is...: Lessons and Advice from the Bright Side', 'Biographies / Memoirs', 900, '0000-00-00', 'From her years as the presidential press secretary to her debates with colleagues on Fox News The Five, Dana Perino reveals the lessons she is learned that have guided her through life, kept her level-headed, and led to her success, even in the face of adversity', 0, '978-145558490.jpg', 'rgetty', ''),
('978-147679430', 'Joey Graceffa', 'In Real Life: My Journey to a Pixelated World', 'Science Fiction / Fantasy', 1200, '2015-06-04', 'Twenty-three year old Joey Graceffa has captured the hearts of millions of teens and young adults through his playful, sweet, and inspirational YouTube presence', 0, '978-147679430.jpg', 'admin1', 'false'),
('978-150394660', 'Blake Crouch', 'Pines (The Wayward Pines Series)', 'Mystery / Thriller', 600, '0000-00-00', 'Secret service agent Ethan Burke arrives in Wayward Pines, Idaho, with a clear mission: locate and recover two federal agents who went missing in the bucolic town one month earlier. But within minutes of his arrival, Ethan is involved in a violent accident. He comes to in a hospital, with no ID, no cell phone, and no briefcase. The medical staff seems friendly enough, but something feelsâ€¦off. As the days pass, Ethanâ€™s investigation into the disappearance of his colleagues turns up more questions than answers. Why canâ€™t he get any phone calls through to his wife and son in the outside world? Why doesnâ€™t anyone believe he is who he says he is? And what is the purpose of the electrified fences surrounding the town? Are they meant to keep the residents in? Or something else out?', 0, '978-150394660.jpg', 'admin', ''),
('978-15946336', 'Paula Hawkins', 'The Girl on the Train', 'Comics / Novels', 840, '0000-00-00', 'The strong-minded Bathsheba Everdeneâ€”and the devoted shepherd, obsessed farmer and dashing soldier who vie for her favorâ€”move through a beautifully realized late 19th-century countryside, still almost untouched by the encroachment of modern life. Fox Searchlight Pictures will release a movie version of Far from the Madding Crowd May 1st', 0, 'TGT_PH.jpg', 'admin', ''),
('9780141039411', 'Eckhart Tolle', 'A New Earth', 'Spiritual', 250, '0000-00-00', 'A Powerful Book that changed the life of mine.', 0, '9780141039411.jpg', 'admin', ''),
('9780385347402', 'BRENT SCHLENDER', 'Becoming Steve Jobs: The Evolution of a Reckless Upstart into a Visionary Leader', 'Biographies / Memoirs', 1080, '0000-00-00', 'Apple cofounder and CEO Steve Jobs (1955-2011) was still a young man when the first wave of an onslaught of books about him began rolling out in the late eighties. Some were big; some were small; but few had contents that can match the access and revelatory quality of this new book by longtime Jobs friend Brent Schnlender. Drawing on interviews with the billionaire entrepreneurs family, close friends, and Apple, Pixar, and Disney executives, Becoming Steve Jobs takes us into the evolving mind and leadership techniques of one of the true visionaries of the digital age.', 0, 'becoming_steve_jobs.jpg', 'admin', ''),
('9780804139021', 'Weir, Andy', 'The Martian', 'Comics / Novels', 720, '0000-00-00', 'Six days ago, astronaut Mark Watney became one of the first people to walk on Mars. Now, he is sure he will be the first person to die there. After a dust storm nearly kills him and forces his crew to evacuate while thinking him dead, Mark finds himself stranded and completely alone with no way to even signal Earth that he is alive--and even if he could get word out, his supplies would be gone long before a rescue could arrive. Chances are, though, he wont have time to starve to death. The damaged machinery, unforgiving environment, or plain-old "human error" are much more likely to kill him first. Will his resourcefulness be enough to overcome the impossible odds against him?', 0, '9780804139021.jpg', 'rgetty', ''),
('9781408703748', 'Walter Isaacson', 'Steve Jobs', 'Biographies / Memoirs', 2051, '0000-00-00', 'Steve Jobs: The Exclusive Biography was easily one of the most awaited books of 2011. And this came as no surprise as Jobs changed the very wheels that greased the machinery of the adolescent technological industry. Isaacson gets down to the brass tacks of the pioneer, the idealist and the devil in this detailed memoir.', 0, '9781408703748.jpg', 'rgetty', ''),
('9789385152184', ' Anuja Chauhan', 'The House that B. J. Built', 'Comics / Novels', 261, '0000-00-00', 'The late Binodini Thakur had been very clear that she would never agree to sell her hissa in her Bauji big old house on Hailey Road. And her daughter Bonu, is determined to honor her mothers wishes.', 0, '9789385152184.jpeg', 'rgetty', ''),
('9876543210', 'Bart Simpson', 'What it takes to be a Simpson', 'Dummies', 1542, '0000-00-00', 'Simpsons legacy continued...', 0, '9876543210.gif', 'rgetty', '');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
`Sno` int(10) NOT NULL,
  `ISBN` varchar(13) NOT NULL,
  `Cost` decimal(10,2) NOT NULL,
  `Count` int(5) NOT NULL,
  `TotalCost` double(10,2) NOT NULL,
  `Date` datetime NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=155 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`Sno`, `ISBN`, `Cost`, `Count`, `TotalCost`, `Date`, `Email`) VALUES
(3, '978-052542765', 1000.00, 1, 0.00, '2015-06-03 20:16:12', 'admin@acolyte.inc'),
(4, '978-03163343', 1080.00, 1, 0.00, '2015-06-03 20:16:12', 'admin@acolyte.inc'),
(5, '978-140273229', 240.00, 1, 0.00, '2015-06-03 23:02:02', 'rgetty6@gmail.com'),
(6, '978-140273229', 240.00, 1, 0.00, '2015-06-03 23:03:49', 'rgetty6@gmail.com'),
(7, '978-125003379', 1080.00, 1, 0.00, '2015-06-03 23:28:46', 'admin@acolyte.inc'),
(12, '978-006230123', 1260.00, 1, 0.00, '2015-06-04 07:18:33', 'admin@acolyte.inc'),
(13, '978-006230123', 1260.00, 1, 0.00, '2015-06-04 07:23:10', 'admin@acolyte.inc'),
(14, '978-006230123', 1260.00, 1, 0.00, '2015-06-04 07:23:17', 'admin@acolyte.inc'),
(15, '978-006230123', 1260.00, 1, 1260.00, '2015-06-04 07:28:51', 'admin@acolyte.inc'),
(16, '978-006230123', 1260.00, 1, 1260.00, '2015-06-04 07:29:05', 'admin@acolyte.inc'),
(17, '978-006230123', 1260.00, 1, 1260.00, '2015-06-04 07:30:43', 'admin@acolyte.inc'),
(18, '978-006230123', 1260.00, 1, 1260.00, '2015-06-04 07:31:19', 'admin@acolyte.inc'),
(19, '978-006230123', 1260.00, 1, 1260.00, '2015-06-04 07:32:01', 'admin@acolyte.inc'),
(20, '978-006230123', 1260.00, 1, 1260.00, '2015-06-04 07:32:09', 'admin@acolyte.inc'),
(21, '978-006230123', 1260.00, 1, 1260.00, '2015-06-04 07:32:18', 'admin@acolyte.inc'),
(22, '978-006230123', 1260.00, 1, 1260.00, '2015-06-04 07:32:27', 'admin@acolyte.inc'),
(23, '978-006230123', 1260.00, 1, 1260.00, '2015-06-04 07:33:31', 'admin@acolyte.inc'),
(24, '978-006230123', 1260.00, 1, 1260.00, '2015-06-04 07:33:49', 'admin@acolyte.inc'),
(25, '978-006230123', 1260.00, 1, 1260.00, '2015-06-04 07:34:05', 'admin@acolyte.inc'),
(26, '978-006230123', 1260.00, 1, 1260.00, '2015-06-04 07:34:21', 'admin@acolyte.inc'),
(27, '978-006230123', 1260.00, 1, 1260.00, '2015-06-04 07:34:44', 'admin@acolyte.inc'),
(28, '978-006230123', 1260.00, 1, 1260.00, '2015-06-04 07:34:50', 'admin@acolyte.inc'),
(29, '978-006230123', 1260.00, 1, 1260.00, '2015-06-04 07:37:32', 'admin@acolyte.inc'),
(30, '978-006230123', 1260.00, 1, 1260.00, '2015-06-04 07:37:52', 'admin@acolyte.inc'),
(31, '978-006230123', 1260.00, 1, 1260.00, '2015-06-04 07:37:58', 'admin@acolyte.inc'),
(32, '978-006230123', 1260.00, 1, 1260.00, '2015-06-04 07:38:05', 'admin@acolyte.inc'),
(33, '978-006230123', 1260.00, 1, 1260.00, '2015-06-04 07:38:15', 'admin@acolyte.inc'),
(34, '978-006230123', 1260.00, 1, 1260.00, '2015-06-04 07:38:50', 'admin@acolyte.inc'),
(35, '978-006230123', 1260.00, 1, 1260.00, '2015-06-04 07:39:02', 'admin@acolyte.inc'),
(36, '978-006230123', 1260.00, 1, 1260.00, '2015-06-04 07:39:30', ''),
(37, '978-031335916', 2000.00, 2, 4000.00, '2015-06-04 07:40:18', 'admin@acolyte.inc'),
(38, '978-074326474', 660.00, 3, 1980.00, '2015-06-04 07:40:19', 'admin@acolyte.inc'),
(39, '978-031335916', 2000.00, 2, 4000.00, '2015-06-04 07:41:39', 'admin@acolyte.inc'),
(40, '978-074326474', 660.00, 3, 1980.00, '2015-06-04 07:41:39', 'admin@acolyte.inc'),
(41, '978-031335916', 2000.00, 2, 4000.00, '2015-06-04 07:41:57', 'admin@acolyte.inc'),
(42, '978-074326474', 660.00, 3, 1980.00, '2015-06-04 07:41:57', 'admin@acolyte.inc'),
(43, '978-031335916', 2000.00, 2, 4000.00, '2015-06-04 07:42:28', 'admin@acolyte.inc'),
(44, '978-074326474', 660.00, 3, 1980.00, '2015-06-04 07:42:28', 'admin@acolyte.inc'),
(45, '978-031335916', 2000.00, 2, 4000.00, '2015-06-04 07:42:43', 'admin@acolyte.inc'),
(46, '978-074326474', 660.00, 3, 1980.00, '2015-06-04 07:42:43', 'admin@acolyte.inc'),
(47, '978-031335916', 2000.00, 2, 4000.00, '2015-06-04 07:42:57', 'admin@acolyte.inc'),
(48, '978-074326474', 660.00, 3, 1980.00, '2015-06-04 07:42:57', 'admin@acolyte.inc'),
(49, '978-031335916', 2000.00, 2, 4000.00, '2015-06-04 07:43:08', 'admin@acolyte.inc'),
(50, '978-074326474', 660.00, 3, 1980.00, '2015-06-04 07:43:08', 'admin@acolyte.inc'),
(51, '978-031335916', 2000.00, 2, 4000.00, '2015-06-04 07:43:19', 'admin@acolyte.inc'),
(52, '978-074326474', 660.00, 3, 1980.00, '2015-06-04 07:43:19', 'admin@acolyte.inc'),
(53, '978-031335916', 2000.00, 2, 4000.00, '2015-06-04 07:49:18', 'admin@acolyte.inc'),
(54, '978-074326474', 660.00, 3, 1980.00, '2015-06-04 07:49:18', 'admin@acolyte.inc'),
(55, '978-031335916', 2000.00, 2, 4000.00, '2015-06-04 07:49:38', 'admin@acolyte.inc'),
(56, '978-074326474', 660.00, 3, 1980.00, '2015-06-04 07:49:38', 'admin@acolyte.inc'),
(57, '978-031335916', 2000.00, 2, 4000.00, '2015-06-04 07:50:05', 'admin@acolyte.inc'),
(58, '978-074326474', 660.00, 3, 1980.00, '2015-06-04 07:50:05', 'admin@acolyte.inc'),
(59, '978-031335916', 2000.00, 2, 4000.00, '2015-06-04 07:50:22', 'admin@acolyte.inc'),
(60, '978-074326474', 660.00, 3, 1980.00, '2015-06-04 07:50:22', 'admin@acolyte.inc'),
(61, '978-031335916', 2000.00, 2, 4000.00, '2015-06-04 07:50:27', 'admin@acolyte.inc'),
(62, '978-074326474', 660.00, 3, 1980.00, '2015-06-04 07:50:27', 'admin@acolyte.inc'),
(63, '978-031335916', 2000.00, 2, 4000.00, '2015-06-04 07:50:47', 'admin@acolyte.inc'),
(64, '978-074326474', 660.00, 3, 1980.00, '2015-06-04 07:50:47', 'admin@acolyte.inc'),
(65, '978-031335916', 2000.00, 2, 4000.00, '2015-06-04 07:50:52', 'admin@acolyte.inc'),
(66, '978-074326474', 660.00, 3, 1980.00, '2015-06-04 07:50:52', 'admin@acolyte.inc'),
(67, '978-031335916', 2000.00, 2, 4000.00, '2015-06-04 07:51:09', 'admin@acolyte.inc'),
(68, '978-074326474', 660.00, 3, 1980.00, '2015-06-04 07:51:09', 'admin@acolyte.inc'),
(69, '978-031335916', 2000.00, 2, 4000.00, '2015-06-04 07:51:13', 'admin@acolyte.inc'),
(70, '978-074326474', 660.00, 3, 1980.00, '2015-06-04 07:51:13', 'admin@acolyte.inc'),
(71, '978-031335916', 2000.00, 2, 4000.00, '2015-06-04 07:51:16', 'admin@acolyte.inc'),
(72, '978-074326474', 660.00, 3, 1980.00, '2015-06-04 07:51:16', 'admin@acolyte.inc'),
(73, '978-031335916', 2000.00, 2, 4000.00, '2015-06-04 07:51:38', 'admin@acolyte.inc'),
(74, '978-074326474', 660.00, 3, 1980.00, '2015-06-04 07:51:38', 'admin@acolyte.inc'),
(75, '978-031335916', 2000.00, 2, 4000.00, '2015-06-04 07:51:56', 'admin@acolyte.inc'),
(76, '978-074326474', 660.00, 3, 1980.00, '2015-06-04 07:51:56', 'admin@acolyte.inc'),
(77, '978-031335916', 2000.00, 2, 4000.00, '2015-06-04 07:52:00', 'admin@acolyte.inc'),
(78, '978-074326474', 660.00, 3, 1980.00, '2015-06-04 07:52:00', 'admin@acolyte.inc'),
(79, '978-031335916', 2000.00, 2, 4000.00, '2015-06-04 07:52:10', 'admin@acolyte.inc'),
(80, '978-074326474', 660.00, 3, 1980.00, '2015-06-04 07:52:10', 'admin@acolyte.inc'),
(81, '978-031335916', 2000.00, 2, 4000.00, '2015-06-04 07:52:16', 'admin@acolyte.inc'),
(82, '978-074326474', 660.00, 3, 1980.00, '2015-06-04 07:52:16', 'admin@acolyte.inc'),
(83, '978-031335916', 2000.00, 2, 4000.00, '2015-06-04 07:52:33', 'admin@acolyte.inc'),
(84, '978-074326474', 660.00, 3, 1980.00, '2015-06-04 07:52:33', 'admin@acolyte.inc'),
(85, '978-031335916', 2000.00, 2, 4000.00, '2015-06-04 07:52:52', 'admin@acolyte.inc'),
(86, '978-074326474', 660.00, 3, 1980.00, '2015-06-04 07:52:52', 'admin@acolyte.inc'),
(87, '978-031335916', 2000.00, 2, 4000.00, '2015-06-04 07:53:07', 'admin@acolyte.inc'),
(88, '978-074326474', 660.00, 3, 1980.00, '2015-06-04 07:53:07', 'admin@acolyte.inc'),
(89, '978-031335916', 2000.00, 2, 4000.00, '2015-06-04 07:53:19', 'admin@acolyte.inc'),
(90, '978-074326474', 660.00, 3, 1980.00, '2015-06-04 07:53:19', 'admin@acolyte.inc'),
(91, '978-031335916', 2000.00, 2, 4000.00, '2015-06-04 07:53:34', 'admin@acolyte.inc'),
(92, '978-074326474', 660.00, 3, 1980.00, '2015-06-04 07:53:35', 'admin@acolyte.inc'),
(93, '978-031335916', 2000.00, 2, 4000.00, '2015-06-04 07:53:39', 'admin@acolyte.inc'),
(94, '978-074326474', 660.00, 3, 1980.00, '2015-06-04 07:53:39', 'admin@acolyte.inc'),
(95, '978-031335916', 2000.00, 2, 4000.00, '2015-06-04 07:53:55', 'admin@acolyte.inc'),
(96, '978-074326474', 660.00, 3, 1980.00, '2015-06-04 07:53:55', 'admin@acolyte.inc'),
(97, '978-031335916', 2000.00, 2, 4000.00, '2015-06-04 07:54:00', 'admin@acolyte.inc'),
(98, '978-074326474', 660.00, 3, 1980.00, '2015-06-04 07:54:00', 'admin@acolyte.inc'),
(99, '978-031335916', 2000.00, 2, 4000.00, '2015-06-04 07:54:15', 'admin@acolyte.inc'),
(100, '978-074326474', 660.00, 3, 1980.00, '2015-06-04 07:54:15', 'admin@acolyte.inc'),
(101, '978-031335916', 2000.00, 2, 4000.00, '2015-06-04 07:54:22', 'admin@acolyte.inc'),
(102, '978-074326474', 660.00, 3, 1980.00, '2015-06-04 07:54:22', 'admin@acolyte.inc'),
(103, '978-031335916', 2000.00, 2, 4000.00, '2015-06-04 07:54:25', 'admin@acolyte.inc'),
(104, '978-074326474', 660.00, 3, 1980.00, '2015-06-04 07:54:25', 'admin@acolyte.inc'),
(105, '978-031335916', 2000.00, 2, 4000.00, '2015-06-04 07:54:52', 'admin@acolyte.inc'),
(106, '978-074326474', 660.00, 3, 1980.00, '2015-06-04 07:54:52', 'admin@acolyte.inc'),
(107, '978-031335916', 2000.00, 2, 4000.00, '2015-06-04 07:55:34', 'admin@acolyte.inc'),
(108, '978-074326474', 660.00, 3, 1980.00, '2015-06-04 07:55:34', 'admin@acolyte.inc'),
(109, '978-031335916', 2000.00, 2, 4000.00, '2015-06-04 07:55:59', 'admin@acolyte.inc'),
(110, '978-074326474', 660.00, 3, 1980.00, '2015-06-04 07:55:59', 'admin@acolyte.inc'),
(111, '978-031335916', 2000.00, 2, 4000.00, '2015-06-04 07:56:26', 'admin@acolyte.inc'),
(112, '978-074326474', 660.00, 3, 1980.00, '2015-06-04 07:56:26', 'admin@acolyte.inc'),
(113, '978-031335916', 2000.00, 2, 4000.00, '2015-06-04 07:56:42', 'admin@acolyte.inc'),
(114, '978-074326474', 660.00, 3, 1980.00, '2015-06-04 07:56:42', 'admin@acolyte.inc'),
(115, '978-031335916', 2000.00, 2, 4000.00, '2015-06-04 07:56:53', 'admin@acolyte.inc'),
(116, '978-074326474', 660.00, 3, 1980.00, '2015-06-04 07:56:53', 'admin@acolyte.inc'),
(117, '978-006230123', 1260.00, 2, 2520.00, '2015-06-04 11:31:27', 'admin@acolyte.inc'),
(118, '978-074326474', 660.00, 0, 0.00, '2015-06-04 11:31:28', 'admin@acolyte.inc'),
(119, '978-006230123', 1260.00, 2, 2520.00, '2015-06-04 11:32:53', 'admin@acolyte.inc'),
(120, '978-047054664', 780.00, 1, 780.00, '2015-06-04 12:09:15', 'admin@acolyte.inc'),
(121, '978-031335916', 2000.00, 1, 2000.00, '2015-06-04 12:36:42', 'admin@acolyte.inc'),
(122, '978-006230123', 1260.00, 5, 6300.00, '2015-06-04 12:49:31', 'rgetty6@gmail.com'),
(123, '978-030747573', 720.00, 1, 720.00, '2015-06-04 12:51:47', 'rgetty6@gmail.com'),
(124, '978-140273229', 240.00, 1, 240.00, '2015-06-04 12:51:47', 'rgetty6@gmail.com'),
(125, '978-150394660', 600.00, 1, 600.00, '2015-06-04 12:51:47', 'rgetty6@gmail.com'),
(126, '978-125003379', 1080.00, 1, 1080.00, '2015-06-04 14:15:36', 'admin@acolyte.inc'),
(127, '4865442123623', 1200.00, 1, 1200.00, '2015-06-04 14:32:33', 'admin@acolyte.inc'),
(128, '978-074326474', 660.00, 1, 660.00, '2015-06-04 14:32:33', 'admin@acolyte.inc'),
(129, '4865442123623', 1200.00, 1, 1200.00, '2015-06-04 14:34:32', 'admin@acolyte.inc'),
(130, '978-074326474', 660.00, 1, 660.00, '2015-06-04 14:34:32', 'admin@acolyte.inc'),
(131, '4865442123623', 1200.00, 1, 1200.00, '2015-06-04 14:36:53', 'admin@acolyte.inc'),
(132, '978-074326474', 660.00, 1, 660.00, '2015-06-04 14:36:53', 'admin@acolyte.inc'),
(133, '9781408703748', 2051.00, 1, 2051.00, '2015-06-04 17:38:41', 'rgetty6@gmail.com'),
(134, '978-006230123', 1260.00, 1, 1260.00, '2015-06-04 17:54:31', 'admin@acolyte.inc'),
(135, '978-074326474', 660.00, 1, 660.00, '2015-06-04 17:54:31', 'admin@acolyte.inc'),
(136, '978-030747573', 720.00, 1, 720.00, '2015-06-04 17:54:31', 'admin@acolyte.inc'),
(137, '978-125003379', 1080.00, 1, 1080.00, '2015-06-05 14:35:36', 'admin@acolyte.inc'),
(138, '978-125003379', 1080.00, 1, 1080.00, '2015-06-05 18:54:18', 'admin@acolyte.inc'),
(139, '978-006230123', 1260.00, 1, 1260.00, '2015-06-05 20:38:47', 'admin@acolyte.inc'),
(140, '978-047054664', 780.00, 1, 780.00, '2015-06-05 20:38:47', 'admin@acolyte.inc'),
(141, '978-14003134', 0.00, 1, 0.00, '2015-06-05 20:38:47', 'admin@acolyte.inc'),
(142, '978-030747573', 720.00, 1, 720.00, '2015-06-08 18:55:32', 'admin@acolyte.inc'),
(143, '978-006230123', 1260.00, 1, 1260.00, '2015-06-09 21:36:47', 'admin@acolyte.inc'),
(144, '978-125003379', 1080.00, 1, 1080.00, '2015-06-10 19:48:36', 'admin@acolyte.inc'),
(145, '978-15946336', 840.00, 4, 3360.00, '2015-06-11 22:16:00', 'rgetty6@gmail.com'),
(146, '978-125003379', 1080.00, 1, 1080.00, '2015-06-16 21:54:30', 'admin@acolyte.inc'),
(147, '978-125003379', 1080.00, 1, 1080.00, '2015-06-20 20:32:31', 'rgetty6@gmail.com'),
(148, '978-125003379', 1080.00, 1, 1080.00, '2015-07-17 08:52:46', 'admin@acolyte.inc'),
(149, '978-125003379', 1080.00, 1, 1080.00, '2015-07-17 08:55:30', 'admin@acolyte.inc'),
(150, '978-125003379', 1080.00, 1, 1080.00, '2015-07-17 08:57:49', 'admin@acolyte.inc'),
(151, '978-125003379', 1080.00, 1, 1080.00, '2015-07-17 08:58:17', 'admin@acolyte.inc'),
(152, '978-052542765', 1000.00, 1, 1000.00, '2015-07-17 08:59:13', 'rgetty6@gmail.com'),
(153, '978-074326474', 660.00, 1, 660.00, '2015-07-17 09:00:45', 'admin@acolyte.inc'),
(154, '978-03133810', 1200.00, 6, 7200.00, '2015-07-31 17:28:22', 'rgetty6@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `Firstname` varchar(30) NOT NULL,
  `Lastname` varchar(30) NOT NULL,
  `User` varchar(65) NOT NULL,
  `Image` varchar(20) NOT NULL,
  `Pass` varchar(100) NOT NULL,
  `Email` varchar(65) NOT NULL,
  `Mobile` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`Firstname`, `Lastname`, `User`, `Image`, `Pass`, `Email`, `Mobile`) VALUES
('Administrator', '', 'admin', 'admin.jpg', '$6$$sMRFTumkNQrHVoPorxwDcq28XtWGugIzXmpyXER0ZApF3uVMHwD.7MVB0k7LLEGcYOmDEXHTWL7gzURhWXDk./', 'admin@acolyte.inc', '1234567890'),
('sid', 'd', 'admin1', 'admin1.png', '$6$$sMRFTumkNQrHVoPorxwDcq28XtWGugIzXmpyXER0ZApF3uVMHwD.7MVB0k7LLEGcYOmDEXHTWL7gzURhWXDk./', 'abc@gmail.com', '999999999999'),
('Albert', 'Einstein', 'einstein', 'einstein.jpg', '$6$$IYJY.akXjf.6zdcQY39PRsXDimL65KVxaVpX5.5647gVh/p/s3VQYBFseKDzeqDDwNy.v3WlYNx4QTm9pMsYm/', 'einstein@stanford.edu', '987654321'),
('Raghu', 'Getty', 'rgetty', 'rgetty.jpg', '$6$$gVzsPOPABnnWcFoaJAb1aZN7AnWcKdTMdrY3EwvAuYxTrPYNFXkUE4dTN0pWdLqDGBsMRFPOYrS1NZnLuURK6/', 'rgetty6@gmail.com', '8801053216'),
('Raghu', 'Getty', 'rgetty6', 'rgetty6.jpg', '$6$$gVzsPOPABnnWcFoaJAb1aZN7AnWcKdTMdrY3EwvAuYxTrPYNFXkUE4dTN0pWdLqDGBsMRFPOYrS1NZnLuURK6/', 'rgetty6@gmail.com', '08801053216'),
('Steven', 'Jobs', 'steve', 'steve.png', '$6$$gVzsPOPABnnWcFoaJAb1aZN7AnWcKdTMdrY3EwvAuYxTrPYNFXkUE4dTN0pWdLqDGBsMRFPOYrS1NZnLuURK6/', 'sjobs@apple.com', '9999999999'),
('Trash', 'Can', 'trash', 'trash.jpg', '$6$$gVzsPOPABnnWcFoaJAb1aZN7AnWcKdTMdrY3EwvAuYxTrPYNFXkUE4dTN0pWdLqDGBsMRFPOYrS1NZnLuURK6/', 'trashcan@acolyte.inc', '8801053216');

-- --------------------------------------------------------

--
-- Table structure for table `user_reviews`
--

CREATE TABLE IF NOT EXISTS `user_reviews` (
`Sno` int(5) NOT NULL,
  `ISBN` varchar(13) NOT NULL,
  `User` varchar(20) NOT NULL,
  `Comment` varchar(160) NOT NULL,
  `Rate` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_reviews`
--

INSERT INTO `user_reviews` (`Sno`, `ISBN`, `User`, `Comment`, `Rate`) VALUES
(1, '978-006230123', 'rgetty', 'Maybe the next steve...', 5),
(2, '978-006230123', 'admin', 'Elon Musk', 5),
(8, '978-125003379', 'admin', 'Awesome!!~', 3),
(11, '978-03163343', 'rgetty', 'Awesome!!~', 4),
(16, '978-125003379', 'rgetty', 'Awesome book ever read!', 5),
(17, '978-147679430', 'admin', 'Awe Awesome..!!', 5),
(18, '978-144242233', 'admin', 'Nice book for children under 15.', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `old_book_details`
--
ALTER TABLE `old_book_details`
 ADD PRIMARY KEY (`ISBN`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
 ADD PRIMARY KEY (`Sno`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
 ADD PRIMARY KEY (`User`);

--
-- Indexes for table `user_reviews`
--
ALTER TABLE `user_reviews`
 ADD PRIMARY KEY (`Sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
MODIFY `Sno` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=155;
--
-- AUTO_INCREMENT for table `user_reviews`
--
ALTER TABLE `user_reviews`
MODIFY `Sno` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
