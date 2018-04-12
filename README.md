# prettylittlething

## How to run
inside project directory

composer install
php artisan products:import

will output how many products were imported, and how many failed / couldn't be imported 

## sql

--
-- Database: `prettylittlething`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `code` varchar(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `stock` int(11) NOT NULL,
  `price` float NOT NULL,
  `discontinued` set('yes','no') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`code`);
COMMIT;
