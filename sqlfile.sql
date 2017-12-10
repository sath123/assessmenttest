/*Table structure for table `invoice_items` */

DROP TABLE IF EXISTS `invoice_items`;

CREATE TABLE `invoice_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `amount` float(7,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `invoice_id` (`invoice_id`),
  CONSTRAINT `invoice_items_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`)
) ENGINE=InnoDB;

/*Data for the table `invoice_items` */

insert  into `invoice_items`(`id`,`invoice_id`,`type`,`amount`) values (185,94,'Domain Register',27.99),(186,94,'Hosting',60.00),(188,94,'Other',7.00),(189,95,'Domain Register',27.99),(190,95,'Hosting',60.00),(192,95,'Other',7.00),(193,96,'Domain Register',159.20),(194,96,'Hosting',374.40),(196,96,'Other',50.00),(197,97,'Domain Register',36.00);

/*Table structure for table `invoices` */

DROP TABLE IF EXISTS `invoices`;

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` enum('Unpaid','Cancelled','Paid') DEFAULT NULL,
  `datepaid` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

/*Data for the table `invoices` */
insert  into `invoices`(`id`,`status`,`datepaid`) values (94,'Paid','2016-07-08 00:00:00'),(95,'Paid','2016-07-08 00:00:00'),(96,'Paid','2016-07-08 00:00:00'),(97,'Paid','2017-01-24 00:00:00'),(98,'Cancelled','2016-07-08 00:00:00'),(99,'Paid','2016-07-08 00:00:00'),(100,'Paid','2016-07-08 00:00:00'),(101,'Paid','2016-07-08 11:11:24'),(102,'Paid','2016-07-08 00:00:00'),(103,'Unpaid','2016-07-08 00:00:00');
