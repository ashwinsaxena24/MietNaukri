-- MySQL dump 10.13  Distrib 5.7.23, for Linux (x86_64)
--
-- Host: localhost    Database: mietnaukri
-- ------------------------------------------------------
-- Server version	5.7.23-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `colleges`
--

DROP TABLE IF EXISTS `colleges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colleges` (
  `college_name` varchar(64) DEFAULT NULL,
  `Student_id` int(11) NOT NULL,
  `year_of_passing` int(4) DEFAULT NULL,
  `specialization_id` int(11) NOT NULL,
  `college_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`college_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colleges`
--

LOCK TABLES `colleges` WRITE;
/*!40000 ALTER TABLE `colleges` DISABLE KEYS */;
INSERT INTO `colleges` VALUES ('MIET',2,2019,1,1),('MIET',3,2019,1,2),('MIET',4,2019,1,3);
/*!40000 ALTER TABLE `colleges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `highest_qualification_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course`
--

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` VALUES (1,'Bachelor of Technology (B.Tech)',3),(2,'Bachelor of Pharmacy (B.Pharm)',3),(3,'Master of Technology (M.Tech)',4),(4,'Master of Business Administration (MBA)',4),(5,'Master of Pharmacy (M.Pharm)',4),(6,'Master of Computer Applications (MCA)',4);
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employer`
--

DROP TABLE IF EXISTS `employer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` char(128) DEFAULT NULL,
  `no_of_jobs_posted` int(11) NOT NULL DEFAULT '0',
  `access_level` enum('admin','employer') NOT NULL,
  `invited_by` int(11) NOT NULL,
  `unique_id` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='Details for employer';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employer`
--

LOCK TABLES `employer` WRITE;
/*!40000 ALTER TABLE `employer` DISABLE KEYS */;
INSERT INTO `employer` VALUES (1,'B109F3BBBC244EB82441917ED06D618B9008DD09B3BEFD1B5E07394C706A8BB980B1D7785E5976EC049B46DF5F1326AF5A2EA6D103FD07C95385FFAB0CACBC86',0,'employer',0,'EMP123');
/*!40000 ALTER TABLE `employer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `highest_qualification`
--

DROP TABLE IF EXISTS `highest_qualification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `highest_qualification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `highest_qualification`
--

LOCK TABLES `highest_qualification` WRITE;
/*!40000 ALTER TABLE `highest_qualification` DISABLE KEYS */;
INSERT INTO `highest_qualification` VALUES (1,'10th'),(2,'12th'),(3,'Graduation'),(4,'Post Graduate'),(5,'Ph.D');
/*!40000 ALTER TABLE `highest_qualification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(32) NOT NULL,
  `job_title` varchar(20) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `branch` int(11) NOT NULL,
  `no_of_applications` int(11) NOT NULL DEFAULT '0',
  `date_added` date NOT NULL,
  `last_date_for_apply` date NOT NULL,
  `posted_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='Data for jobs';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` VALUES (1,'Google','Mobile App','Android Application','Design an Android Application',1,3,'2018-07-15','2018-08-15',1),(2,'Amazon','Cloud Computing','EC2 Solutions','Provide ec2 solutions for people',1,1,'2018-07-15','2018-08-15',1),(3,'Microsoft','Windows Program','C# Developer','Develop windows 10 application using C#',1,0,'2018-07-15','2018-08-15',1);
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs_applied`
--

DROP TABLE IF EXISTS `jobs_applied`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs_applied` (
  `jobs_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `status` enum('applied','seen','in-touch','rejected','selected') NOT NULL,
  `resume_id` int(11) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `college` varchar(50) NOT NULL,
  PRIMARY KEY (`jobs_id`,`student_id`),
  CONSTRAINT `jobs_applied_ibfk_1` FOREIGN KEY (`jobs_id`) REFERENCES `jobs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Total no of applicants on the job';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs_applied`
--

LOCK TABLES `jobs_applied` WRITE;
/*!40000 ALTER TABLE `jobs_applied` DISABLE KEYS */;
INSERT INTO `jobs_applied` VALUES (1,2,'applied',2,'8126622339','ashwin.saxena24@gmail.com','MIET'),(1,4,'applied',1,'8126622339','ashwin.saxena24@gmail.com','MIET'),(2,2,'applied',2,'8126622339','ashwin.saxena24@gmail.com','MIET');
/*!40000 ALTER TABLE `jobs_applied` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs_skills`
--

DROP TABLE IF EXISTS `jobs_skills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs_skills` (
  `Jobs_id` int(11) NOT NULL,
  `skills_id` int(11) NOT NULL,
  PRIMARY KEY (`Jobs_id`,`skills_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs_skills`
--

LOCK TABLES `jobs_skills` WRITE;
/*!40000 ALTER TABLE `jobs_skills` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs_skills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3597 DEFAULT CHARSET=latin1 COMMENT='Data for location';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `location`
--

LOCK TABLES `location` WRITE;
/*!40000 ALTER TABLE `location` DISABLE KEYS */;
INSERT INTO `location` VALUES (2399,'Mumbai'),(2400,'Delhi'),(2401,'Bengaluru'),(2402,'Ahmedabad'),(2403,'Hyderabad'),(2404,'Chennai'),(2405,'Kolkata'),(2406,'Pune'),(2407,'Jaipur'),(2408,'Surat'),(2409,'Lucknow'),(2410,'Kanpur'),(2411,'Nagpur'),(2412,'Patna'),(2413,'Indore'),(2414,'Thane'),(2415,'Bhopal'),(2416,'Visakhapatnam'),(2417,'Vadodara'),(2418,'Firozabad'),(2419,'Ludhiana'),(2420,'Rajkot'),(2421,'Agra'),(2422,'Siliguri'),(2423,'Nashik'),(2424,'Faridabad'),(2425,'Patiala'),(2426,'Meerut'),(2427,'Kalyan-Dombivali'),(2428,'Vasai-Virar'),(2429,'Varanasi'),(2430,'Srinagar'),(2431,'Dhanbad'),(2432,'Jodhpur'),(2433,'Amritsar'),(2434,'Raipur'),(2435,'Allahabad'),(2436,'Coimbatore'),(2437,'Jabalpur'),(2438,'Gwalior'),(2439,'Vijayawada'),(2440,'Madurai'),(2441,'Guwahati'),(2442,'Chandigarh'),(2443,'Hubli-Dharwad'),(2444,'Amroha'),(2445,'Moradabad'),(2446,'Gurgaon'),(2447,'Aligarh'),(2448,'Solapur'),(2449,'Ranchi'),(2450,'Jalandhar'),(2451,'Tiruchirappalli'),(2452,'Bhubaneswar'),(2453,'Salem'),(2454,'Warangal'),(2455,'Mira-Bhayandar'),(2456,'Thiruvananthapuram'),(2457,'Bhiwandi'),(2458,'Saharanpur'),(2459,'Guntur'),(2460,'Amravati'),(2461,'Bikaner'),(2462,'Noida'),(2463,'Jamshedpur'),(2464,'Bhilai Nagar'),(2465,'Cuttack'),(2466,'Kochi'),(2467,'Udaipur'),(2468,'Bhavnagar'),(2469,'Dehradun'),(2470,'Asansol'),(2471,'Nanded-Waghala'),(2472,'Ajmer'),(2473,'Jamnagar'),(2474,'Ujjain'),(2475,'Sangli'),(2476,'Loni'),(2477,'Jhansi'),(2478,'Pondicherry'),(2479,'Nellore'),(2480,'Jammu'),(2481,'Belagavi'),(2482,'Raurkela'),(2483,'Mangaluru'),(2484,'Tirunelveli'),(2485,'Malegaon'),(2486,'Gaya'),(2487,'Tiruppur'),(2488,'Davanagere'),(2489,'Kozhikode'),(2490,'Akola'),(2491,'Kurnool'),(2492,'Bokaro Steel City'),(2493,'Rajahmundry'),(2494,'Ballari'),(2495,'Agartala'),(2496,'Bhagalpur'),(2497,'Latur'),(2498,'Dhule'),(2499,'Korba'),(2500,'Bhilwara'),(2501,'Brahmapur'),(2502,'Mysore'),(2503,'Muzaffarpur'),(2504,'Ahmednagar'),(2505,'Kollam'),(2506,'Raghunathganj'),(2507,'Bilaspur'),(2508,'Shahjahanpur'),(2509,'Thrissur'),(2510,'Alwar'),(2511,'Kakinada'),(2512,'Nizamabad'),(2513,'Sagar'),(2514,'Tumkur'),(2515,'Hisar'),(2516,'Rohtak'),(2517,'Panipat'),(2518,'Darbhanga'),(2519,'Kharagpur'),(2520,'Aizawl'),(2521,'Ichalkaranji'),(2522,'Tirupati'),(2523,'Karnal'),(2524,'Bathinda'),(2525,'Rampur'),(2526,'Shivamogga'),(2527,'Ratlam'),(2528,'Modinagar'),(2529,'Durg'),(2530,'Shillong'),(2531,'Imphal'),(2532,'Hapur'),(2533,'Ranipet'),(2534,'Anantapur'),(2535,'Arrah'),(2536,'Karimnagar'),(2537,'Parbhani'),(2538,'Etawah'),(2539,'Bharatpur'),(2540,'Begusarai'),(2541,'New Delhi'),(2542,'Chhapra'),(2543,'Kadapa'),(2544,'Ramagundam'),(2545,'Pali'),(2546,'Satna'),(2547,'Vizianagaram'),(2548,'Katihar'),(2549,'Hardwar'),(2550,'Sonipat'),(2551,'Nagercoil'),(2552,'Thanjavur'),(2553,'Murwara (Katni)'),(2554,'Naihati'),(2555,'Sambhal'),(2556,'Nadiad'),(2557,'Yamunanagar'),(2558,'English Bazar'),(2559,'Eluru'),(2560,'Munger'),(2561,'Panchkula'),(2562,'Raayachuru'),(2563,'Panvel'),(2564,'Deoghar'),(2565,'Ongole'),(2566,'Nandyal'),(2567,'Morena'),(2568,'Bhiwani'),(2569,'Porbandar'),(2570,'Palakkad'),(2571,'Anand'),(2572,'Purnia'),(2573,'Baharampur'),(2574,'Barmer'),(2575,'Morvi'),(2576,'Orai'),(2577,'Bahraich'),(2578,'Sikar'),(2579,'Vellore'),(2580,'Singrauli'),(2581,'Khammam'),(2582,'Mahesana'),(2583,'Silchar'),(2584,'Sambalpur'),(2585,'Rewa'),(2586,'Unnao'),(2587,'Hugli-Chinsurah'),(2588,'Raiganj'),(2589,'Phusro'),(2590,'Adityapur'),(2591,'Alappuzha'),(2592,'Bahadurgarh'),(2593,'Machilipatnam'),(2594,'Rae Bareli'),(2595,'Jalpaiguri'),(2596,'Bharuch'),(2597,'Pathankot'),(2598,'Hoshiarpur'),(2599,'Baramula'),(2600,'Adoni'),(2601,'Jind'),(2602,'Tonk'),(2603,'Tenali'),(2604,'Kancheepuram'),(2605,'Vapi'),(2606,'Sirsa'),(2607,'Navsari'),(2608,'Mahbubnagar'),(2609,'Puri'),(2610,'Robertson Pet'),(2611,'Erode'),(2612,'Batala'),(2613,'Vidisha'),(2614,'Saharsa'),(2615,'Thanesar'),(2616,'Chittoor'),(2617,'Veraval'),(2618,'Lakhimpur'),(2619,'Sitapur'),(2620,'Hindupur'),(2621,'Santipur'),(2622,'Balurghat'),(2623,'Ganjbasoda'),(2624,'Moga'),(2625,'Proddatur'),(2626,'Srinagar'),(2627,'Medinipur'),(2628,'Habra'),(2629,'Sasaram'),(2630,'Hajipur'),(2631,'Bhuj'),(2632,'Shivpuri'),(2633,'Ranaghat'),(2634,'Shimla'),(2635,'Tiruvannamalai'),(2636,'Kaithal'),(2637,'Rajnandgaon'),(2638,'Godhra'),(2639,'Hazaribag'),(2640,'Bhimavaram'),(2641,'Mandsaur'),(2642,'Dibrugarh'),(2643,'Kolar'),(2644,'Bankura'),(2645,'Mandya'),(2646,'Dehri-on-Sone'),(2647,'Madanapalle'),(2648,'Malerkotla'),(2649,'Lalitpur'),(2650,'Bettiah'),(2651,'Pollachi'),(2652,'Khanna'),(2653,'Neemuch'),(2654,'Palwal'),(2655,'Palanpur'),(2656,'Guntakal'),(2657,'Nabadwip'),(2658,'Udupi'),(2659,'Jagdalpur'),(2660,'Motihari'),(2661,'Pilibhit'),(2662,'Dimapur'),(2663,'Mohali'),(2664,'Sadulpur'),(2665,'Rajapalayam'),(2666,'Dharmavaram'),(2667,'Kashipur'),(2668,'Sivakasi'),(2669,'Darjiling'),(2670,'Chikkamagaluru'),(2671,'Gudivada'),(2672,'Baleshwar Town'),(2673,'Mancherial'),(2674,'Srikakulam'),(2675,'Adilabad'),(2676,'Yavatmal'),(2677,'Barnala'),(2678,'Nagaon'),(2679,'Narasaraopet'),(2680,'Raigarh'),(2681,'Roorkee'),(2682,'Valsad'),(2683,'Ambikapur'),(2684,'Giridih'),(2685,'Chandausi'),(2686,'Purulia'),(2687,'Patan'),(2688,'Bagaha'),(2689,'Hardoi '),(2690,'Achalpur'),(2691,'Osmanabad'),(2692,'Deesa'),(2693,'Nandurbar'),(2694,'Azamgarh'),(2695,'Ramgarh'),(2696,'Firozpur'),(2697,'Baripada Town'),(2698,'Karwar'),(2699,'Siwan'),(2700,'Rajampet'),(2701,'Pudukkottai'),(2702,'Anantnag'),(2703,'Tadpatri'),(2704,'Satara'),(2705,'Bhadrak'),(2706,'Kishanganj'),(2707,'Suryapet'),(2708,'Wardha'),(2709,'Ranebennuru'),(2710,'Amreli'),(2711,'Neyveli (TS)'),(2712,'Jamalpur'),(2713,'Marmagao'),(2714,'Udgir'),(2715,'Tadepalligudem'),(2716,'Nagapattinam'),(2717,'Buxar'),(2718,'Aurangabad'),(2719,'Jehanabad'),(2720,'Phagwara'),(2721,'Khair'),(2722,'Sawai Madhopur'),(2723,'Kapurthala'),(2724,'Chilakaluripet'),(2725,'Aurangabad'),(2726,'Malappuram'),(2727,'Rewari'),(2728,'Nagaur'),(2729,'Sultanpur'),(2730,'Nagda'),(2731,'Port Blair'),(2732,'Lakhisarai'),(2733,'Panaji'),(2734,'Tinsukia'),(2735,'Itarsi'),(2736,'Kohima'),(2737,'Balangir'),(2738,'Nawada'),(2739,'Jharsuguda'),(2740,'Jagtial'),(2741,'Viluppuram'),(2742,'Amalner'),(2743,'Zirakpur'),(2744,'Tanda'),(2745,'Tiruchengode'),(2746,'Nagina'),(2747,'Yemmiganur'),(2748,'Vaniyambadi'),(2749,'Sarni'),(2750,'Theni Allinagaram'),(2751,'Margao'),(2752,'Akot'),(2753,'Sehore'),(2754,'Mhow Cantonment'),(2755,'Kot Kapura'),(2756,'Makrana'),(2757,'Pandharpur'),(2758,'Miryalaguda'),(2759,'Shamli'),(2760,'Seoni'),(2761,'Ranibennur'),(2762,'Kadiri'),(2763,'Shrirampur'),(2764,'Rudrapur'),(2765,'Parli'),(2766,'Najibabad'),(2767,'Nirmal'),(2768,'Udhagamandalam'),(2769,'Shikohabad'),(2770,'Jhumri Tilaiya'),(2771,'Aruppukkottai'),(2772,'Ponnani'),(2773,'Jamui'),(2774,'Sitamarhi'),(2775,'Chirala'),(2776,'Anjar'),(2777,'Karaikal'),(2778,'Hansi'),(2779,'Anakapalle'),(2780,'Mahasamund'),(2781,'Faridkot'),(2782,'Saunda'),(2783,'Dhoraji'),(2784,'Paramakudi'),(2785,'Balaghat'),(2786,'Sujangarh'),(2787,'Khambhat'),(2788,'Muktsar'),(2789,'Rajpura'),(2790,'Kavali'),(2791,'Dhamtari'),(2792,'Ashok Nagar'),(2793,'Sardarshahar'),(2794,'Mahuva'),(2795,'Bargarh'),(2796,'Kamareddy'),(2797,'Sahibganj'),(2798,'Kothagudem'),(2799,'Ramanagaram'),(2800,'Gokak'),(2801,'Tikamgarh'),(2802,'Araria'),(2803,'Rishikesh'),(2804,'Shahdol'),(2805,'Arakkonam'),(2806,'Washim'),(2807,'Sangrur'),(2808,'Bodhan'),(2809,'Fazilka'),(2810,'Palacole'),(2811,'Keshod'),(2812,'Sullurpeta'),(2813,'Wadhwan'),(2814,'Gurdaspur'),(2815,'Vatakara'),(2816,'Tura'),(2817,'Narnaul'),(2818,'Kharar'),(2819,'Yadgir'),(2820,'Ambejogai'),(2821,'Ankleshwar'),(2822,'Savarkundla'),(2823,'Paradip'),(2824,'Virudhachalam'),(2825,'Kanhangad'),(2826,'Kadi'),(2827,'Srivilliputhur'),(2828,'Gobindgarh'),(2829,'Tindivanam'),(2830,'Mansa'),(2831,'Taliparamba'),(2832,'Manmad'),(2833,'Tanuku'),(2834,'Rayachoti'),(2835,'Virudhunagar'),(2836,'Koyilandy'),(2837,'Jorhat'),(2838,'Karur'),(2839,'Valparai'),(2840,'Srikalahasti'),(2841,'Neyyattinkara'),(2842,'Bapatla'),(2843,'Fatehabad'),(2844,'Malout'),(2845,'Sankarankovil'),(2846,'Tenkasi'),(2847,'Ratnagiri'),(2848,'Rabkavi Banhatti'),(2849,'Sikandrabad'),(2850,'Chaibasa'),(2851,'Chirmiri'),(2852,'Palwancha'),(2853,'Bhawanipatna'),(2854,'Kayamkulam'),(2855,'Pithampur'),(2856,'Nabha'),(2857,'\"Shahabad, Hardoi\"'),(2858,'Dhenkanal'),(2859,'Uran Islampur'),(2860,'Gopalganj'),(2861,'Bongaigaon City'),(2862,'Palani'),(2863,'Pusad'),(2864,'Sopore'),(2865,'Pilkhuwa'),(2866,'Tarn Taran'),(2867,'Renukoot'),(2868,'Mandamarri'),(2869,'Shahabad'),(2870,'Barbil'),(2871,'Koratla'),(2872,'Madhubani'),(2873,'Arambagh'),(2874,'Gohana'),(2875,'Ladnu'),(2876,'Pattukkottai'),(2877,'Sirsi'),(2878,'Sircilla'),(2879,'Tamluk'),(2880,'Jagraon'),(2881,'Alirajpur'),(2882,'Tandur'),(2883,'Naidupet'),(2884,'Tirupathur'),(2885,'Tohana'),(2886,'Ratangarh'),(2887,'Dhubri'),(2888,'Masaurhi'),(2889,'Visnagar'),(2890,'Vrindavan'),(2891,'Nokha'),(2892,'Nagari'),(2893,'Narwana'),(2894,'Ramanathapuram'),(2895,'Ujhani'),(2896,'Samastipur'),(2897,'Laharpur'),(2898,'Sangamner'),(2899,'Nimbahera'),(2900,'Siddipet'),(2901,'Suri'),(2902,'Diphu'),(2903,'Jhargram'),(2904,'Shirpur-Warwade'),(2905,'Tilhar'),(2906,'Sindhnur'),(2907,'Udumalaipettai'),(2908,'Malkapur'),(2909,'Wanaparthy'),(2910,'Gudur'),(2911,'Kendujhar'),(2912,'Mandla'),(2913,'Mandi'),(2914,'Nedumangad'),(2915,'North Lakhimpur'),(2916,'Vinukonda'),(2917,'Tiptur'),(2918,'Gobichettipalayam'),(2919,'Sunabeda'),(2920,'Wani'),(2921,'Upleta'),(2922,'Narasapuram'),(2923,'Nuzvid'),(2924,'Tezpur'),(2925,'Una'),(2926,'Markapur'),(2927,'Sheopur'),(2928,'Thiruvarur'),(2929,'Sidhpur'),(2930,'Sahaswan'),(2931,'Suratgarh'),(2932,'Shajapur'),(2933,'Rayagada'),(2934,'Lonavla'),(2935,'Ponnur'),(2936,'Kagaznagar'),(2937,'Gadwal'),(2938,'Bhatapara'),(2939,'Kandukur'),(2940,'Sangareddy'),(2941,'Unjha'),(2942,'Lunglei'),(2943,'Karimganj'),(2944,'Kannur'),(2945,'Bobbili'),(2946,'Mokameh'),(2947,'Talegaon Dabhade'),(2948,'Anjangaon'),(2949,'Mangrol'),(2950,'Sunam'),(2951,'Gangarampur'),(2952,'Thiruvallur'),(2953,'Tirur'),(2954,'Rath'),(2955,'Jatani'),(2956,'Viramgam'),(2957,'Rajsamand'),(2958,'Yanam'),(2959,'Kottayam'),(2960,'Panruti'),(2961,'Dhuri'),(2962,'Namakkal'),(2963,'Kasaragod'),(2964,'Modasa'),(2965,'Rayadurg'),(2966,'Supaul'),(2967,'Kunnamkulam'),(2968,'Umred'),(2969,'Bellampalle'),(2970,'Sibsagar'),(2971,'Mandi Dabwali'),(2972,'Ottappalam'),(2973,'Dumraon'),(2974,'Samalkot'),(2975,'Jaggaiahpet'),(2976,'Goalpara'),(2977,'Tuni'),(2978,'Lachhmangarh'),(2979,'Bhongir'),(2980,'Amalapuram'),(2981,'Firozpur Cantt.'),(2982,'Vikarabad'),(2983,'Thiruvalla'),(2984,'Sherkot'),(2985,'Palghar'),(2986,'Shegaon'),(2987,'Jangaon'),(2988,'Bheemunipatnam'),(2989,'Panna'),(2990,'Thodupuzha'),(2991,'Palitana'),(2992,'Arwal'),(2993,'Venkatagiri'),(2994,'Kalpi'),(2995,'Rajgarh (Churu)'),(2996,'Sattenapalle'),(2997,'Arsikere'),(2998,'Ozar'),(2999,'Thirumangalam'),(3000,'Petlad'),(3001,'Nasirabad'),(3002,'Phaltan'),(3003,'Rampurhat'),(3004,'Nanjangud'),(3005,'Forbesganj'),(3006,'Tundla'),(3007,'Sagara'),(3008,'Pithapuram'),(3009,'Sira'),(3010,'Bhadrachalam'),(3011,'Charkhi Dadri'),(3012,'Chatra'),(3013,'Palasa Kasibugga'),(3014,'Nohar'),(3015,'Yevla'),(3016,'Bhainsa'),(3017,'Parvathipuram'),(3018,'Shahade'),(3019,'Chalakudy'),(3020,'Narkatiaganj'),(3021,'Kapadvanj'),(3022,'Macherla'),(3023,'Raghogarh-Vijaypur'),(3024,'Rupnagar'),(3025,'Naugachhia'),(3026,'Sendhwa'),(3027,'Byasanagar'),(3028,'Sandila'),(3029,'Gooty'),(3030,'Salur'),(3031,'Nanpara'),(3032,'Sardhana'),(3033,'Vita'),(3034,'Gumia'),(3035,'Puttur'),(3036,'Jalandhar Cantt.'),(3037,'Nehtaur'),(3038,'Changanassery'),(3039,'Mandapeta'),(3040,'Dumka'),(3041,'Seohara'),(3042,'Umarkhed'),(3043,'Madhupur'),(3044,'Vikramasingapuram'),(3045,'Punalur'),(3046,'Kendrapara'),(3047,'Sihor'),(3048,'Nellikuppam'),(3049,'Samana'),(3050,'Warora'),(3051,'Nilambur'),(3052,'Rasipuram'),(3053,'Ramnagar'),(3054,'Jammalamadugu'),(3055,'Nawanshahr'),(3056,'Thoubal'),(3057,'Athni'),(3058,'Cherthala'),(3059,'Sidhi'),(3060,'Farooqnagar'),(3061,'Peddapuram'),(3062,'Chirkunda'),(3063,'Pachora'),(3064,'Madhepura'),(3065,'Pithoragarh'),(3066,'Tumsar'),(3067,'Phalodi'),(3068,'Tiruttani'),(3069,'Rampura Phul'),(3070,'Perinthalmanna'),(3071,'Padrauna'),(3072,'Pipariya'),(3073,'Dalli-Rajhara'),(3074,'Punganur'),(3075,'Mattannur'),(3076,'Mathura'),(3077,'Thakurdwara'),(3078,'Mulbagal'),(3079,'Manjlegaon'),(3080,'Wankaner'),(3081,'Sillod'),(3082,'Nidadavole'),(3083,'Surapura'),(3084,'Rajagangapur'),(3085,'Sheikhpura'),(3086,'Parlakhemundi'),(3087,'Kalimpong'),(3088,'Siruguppa'),(3089,'Arvi'),(3090,'Limbdi'),(3091,'Barpeta'),(3092,'Manglaur'),(3093,'Repalle'),(3094,'Mudhol'),(3095,'Shujalpur'),(3096,'Mandvi'),(3097,'Thangadh'),(3098,'Sironj'),(3099,'Nandura'),(3100,'Shoranur'),(3101,'Nathdwara'),(3102,'Periyakulam'),(3103,'Sultanganj'),(3104,'Medak'),(3105,'Narayanpet'),(3106,'Raxaul Bazar'),(3107,'Rajauri'),(3108,'Pernampattu'),(3109,'Nainital'),(3110,'Ramachandrapuram'),(3111,'Vaijapur'),(3112,'Nangal'),(3113,'Sidlaghatta'),(3114,'Punch'),(3115,'Pandhurna'),(3116,'Wadgaon Road'),(3117,'Talcher'),(3118,'Varkala'),(3119,'Pilani'),(3120,'Nowgong'),(3121,'Naila Janjgir'),(3122,'Mapusa'),(3123,'Vellakoil'),(3124,'Merta City'),(3125,'Sivaganga'),(3126,'Mandideep'),(3127,'Sailu'),(3128,'Vyara'),(3129,'Kovvur'),(3130,'Vadalur'),(3131,'Nawabganj'),(3132,'Padra'),(3133,'Sainthia'),(3134,'Siana'),(3135,'Shahpur'),(3136,'Sojat'),(3137,'Noorpur'),(3138,'Paravoor'),(3139,'Murtijapur'),(3140,'Ramnagar'),(3141,'Sundargarh'),(3142,'Taki'),(3143,'Saundatti-Yellamma'),(3144,'Pathanamthitta'),(3145,'Wadi'),(3146,'Rameshwaram'),(3147,'Tasgaon'),(3148,'Sikandra Rao'),(3149,'Sihora'),(3150,'Tiruvethipuram'),(3151,'Tiruvuru'),(3152,'Mehkar'),(3153,'Peringathur'),(3154,'Perambalur'),(3155,'Manvi'),(3156,'Zunheboto'),(3157,'Mahnar Bazar'),(3158,'Attingal'),(3159,'Shahbad'),(3160,'Puranpur'),(3161,'Nelamangala'),(3162,'Nakodar'),(3163,'Lunawada'),(3164,'Murshidabad'),(3165,'Mahe'),(3166,'Lanka'),(3167,'Rudauli'),(3168,'Tuensang'),(3169,'Lakshmeshwar'),(3170,'Zira'),(3171,'Yawal'),(3172,'Thana Bhawan'),(3173,'Ramdurg'),(3174,'Pulgaon'),(3175,'Sadasivpet'),(3176,'Nargund'),(3177,'Neem-Ka-Thana'),(3178,'Memari'),(3179,'Nilanga'),(3180,'Naharlagun'),(3181,'Pakaur'),(3182,'Wai'),(3183,'Tarikere'),(3184,'Malavalli'),(3185,'Raisen'),(3186,'Lahar'),(3187,'Uravakonda'),(3188,'Savanur'),(3189,'Sirohi'),(3190,'Udhampur'),(3191,'Umarga'),(3192,'Pratapgarh'),(3193,'Lingsugur'),(3194,'Usilampatti'),(3195,'Palia Kalan'),(3196,'Wokha'),(3197,'Rajpipla'),(3198,'Vijayapura'),(3199,'Rawatbhata'),(3200,'Sangaria'),(3201,'Paithan'),(3202,'Rahuri'),(3203,'Patti'),(3204,'Zaidpur'),(3205,'Lalsot'),(3206,'Maihar'),(3207,'Vedaranyam'),(3208,'Nawapur'),(3209,'Solan'),(3210,'Vapi'),(3211,'Sanawad'),(3212,'Warisaliganj'),(3213,'Revelganj'),(3214,'Sabalgarh'),(3215,'Tuljapur'),(3216,'Simdega'),(3217,'Musabani'),(3218,'Kodungallur'),(3219,'Phulabani'),(3220,'Umreth'),(3221,'Narsipatnam'),(3222,'Nautanwa'),(3223,'Rajgir'),(3224,'Yellandu'),(3225,'Sathyamangalam'),(3226,'Pilibanga'),(3227,'Morshi'),(3228,'Pehowa'),(3229,'Sonepur'),(3230,'Pappinisseri'),(3231,'Zamania'),(3232,'Mihijam'),(3233,'Purna'),(3234,'Puliyankudi'),(3235,'Umaria'),(3236,'Porsa'),(3237,'Naugawan Sadat'),(3238,'Fatehpur Sikri'),(3239,'Manuguru'),(3240,'Udaipur'),(3241,'Pipar City'),(3242,'Pattamundai'),(3243,'Nanjikottai'),(3244,'Taranagar'),(3245,'Yerraguntla'),(3246,'Satana'),(3247,'Sherghati'),(3248,'Sankeshwara'),(3249,'Madikeri'),(3250,'Thuraiyur'),(3251,'Sanand'),(3252,'Rajula'),(3253,'Kyathampalle'),(3254,'\"Shahabad, Rampur\"'),(3255,'Tilda Newra'),(3256,'Narsinghgarh'),(3257,'Malaj Khand'),(3258,'Sarangpur'),(3259,'Robertsganj'),(3260,'Sirkali'),(3261,'Radhanpur'),(3262,'Tiruchendur'),(3263,'Utraula'),(3264,'Patratu'),(3265,'\"Vijainagar, Ajmer\"'),(3266,'Periyasemur'),(3267,'Pathri'),(3268,'Sadabad'),(3269,'Talikota'),(3270,'Sinnar'),(3271,'Mungeli'),(3272,'Sedam'),(3273,'Shikaripur'),(3274,'Sumerpur'),(3275,'Sattur'),(3276,'Sugauli'),(3277,'Lumding'),(3278,'Vandavasi'),(3279,'Titlagarh'),(3280,'Uchgaon'),(3281,'Mokokchung'),(3282,'Paschim Punropara'),(3283,'Sagwara'),(3284,'Ramganj Mandi'),(3285,'Tarakeswar'),(3286,'Mahalingapura'),(3287,'Dharmanagar'),(3288,'Mahemdabad'),(3289,'Manendragarh'),(3290,'Uran'),(3291,'Tharamangalam'),(3292,'Tirukkoyilur'),(3293,'Pen'),(3294,'Makhdumpur'),(3295,'Maner'),(3296,'Oddanchatram'),(3297,'Palladam'),(3298,'Mundi'),(3299,'Nabarangapur'),(3300,'Mudalagi'),(3301,'Samalkha'),(3302,'Nepanagar'),(3303,'Karjat'),(3304,'Ranavav'),(3305,'Pedana'),(3306,'Pinjore'),(3307,'Lakheri'),(3308,'Pasan'),(3309,'Puttur'),(3310,'Vadakkuvalliyur'),(3311,'Tirukalukundram'),(3312,'Mahidpur'),(3313,'Mussoorie'),(3314,'Muvattupuzha'),(3315,'Rasra'),(3316,'Udaipurwati'),(3317,'Manwath'),(3318,'Adoor'),(3319,'Uthamapalayam'),(3320,'Partur'),(3321,'Nahan'),(3322,'Ladwa'),(3323,'Mankachar'),(3324,'Nongstoin'),(3325,'Losal'),(3326,'Sri Madhopur'),(3327,'Ramngarh'),(3328,'Mavelikkara'),(3329,'Rawatsar'),(3330,'Rajakhera'),(3331,'Lar'),(3332,'Muddebihal'),(3333,'Sirsaganj'),(3334,'Shahpura'),(3335,'Surandai'),(3336,'Sangole'),(3337,'Pavagada'),(3338,'Tharad'),(3339,'Mansa'),(3340,'Umbergaon'),(3341,'Mavoor'),(3342,'Nalbari'),(3343,'Talaja'),(3344,'Malur'),(3345,'Mangrulpir'),(3346,'Soro'),(3347,'Shahpura'),(3348,'Vadnagar'),(3349,'Raisinghnagar'),(3350,'Sindhagi'),(3351,'Sanduru'),(3352,'Sohna'),(3353,'Manavadar'),(3354,'Pihani'),(3355,'Safidon'),(3356,'Risod'),(3357,'Rosera'),(3358,'Sankari'),(3359,'Malpura'),(3360,'Sonamukhi'),(3361,'\"Shamsabad, Agra\"'),(3362,'Nokha'),(3363,'Mainaguri'),(3364,'Afzalpur'),(3365,'Shirur'),(3366,'Salaya'),(3367,'Shenkottai'),(3368,'Pratapgarh'),(3369,'Vadipatti'),(3370,'Nagarkurnool'),(3371,'Savner'),(3372,'Sasvad'),(3373,'Rudrapur'),(3374,'Soron'),(3375,'Sholingur'),(3376,'Pandharkaoda'),(3377,'Perumbavoor'),(3378,'Maddur'),(3379,'Nadbai'),(3380,'Talode'),(3381,'Shrigonda'),(3382,'Madhugiri'),(3383,'Tekkalakote'),(3384,'Seoni-Malwa'),(3385,'Shirdi'),(3386,'Terdal'),(3387,'Raver'),(3388,'Tirupathur'),(3389,'Taraori'),(3390,'Mukhed'),(3391,'Manachanallur'),(3392,'Rehli'),(3393,'Sanchore'),(3394,'Rajura'),(3395,'Piro'),(3396,'Mudabidri'),(3397,'Vadgaon Kasba'),(3398,'Nagar'),(3399,'Vijapur'),(3400,'Viswanatham'),(3401,'Polur'),(3402,'Panagudi'),(3403,'Manawar'),(3404,'Tehri'),(3405,'Samdhan'),(3406,'Pardi'),(3407,'Rahatgarh'),(3408,'Panagar'),(3409,'Uthiramerur'),(3410,'Tirora'),(3411,'Rangia'),(3412,'Sahjanwa'),(3413,'Wara Seoni'),(3414,'Magadi'),(3415,'Rajgarh (Alwar)'),(3416,'Rafiganj'),(3417,'Tarana'),(3418,'Rampur Maniharan'),(3419,'Sheoganj'),(3420,'Raikot'),(3421,'Pauri'),(3422,'Sumerpur'),(3423,'Navalgund'),(3424,'Shahganj'),(3425,'Marhaura'),(3426,'Tulsipur'),(3427,'Sadri'),(3428,'Thiruthuraipoondi'),(3429,'Shiggaon'),(3430,'Pallapatti'),(3431,'Mahendragarh'),(3432,'Sausar'),(3433,'Ponneri'),(3434,'Mahad'),(3435,'Lohardaga'),(3436,'Tirwaganj'),(3437,'Margherita'),(3438,'Sundarnagar'),(3439,'Rajgarh'),(3440,'Mangaldoi'),(3441,'Renigunta'),(3442,'Longowal'),(3443,'Ratia'),(3444,'Lalgudi'),(3445,'Shrirangapattana'),(3446,'Niwari'),(3447,'Natham'),(3448,'Unnamalaikadai'),(3449,'Mirganj'),(3450,'Todaraisingh'),(3451,'Warhapur'),(3452,'Rajam'),(3453,'Urmar Tanda'),(3454,'Lonar'),(3455,'Powayan'),(3456,'P.N.Patti'),(3457,'Palampur'),(3458,'Sindagi'),(3459,'Sandi'),(3460,'Vaikom'),(3461,'Malda'),(3462,'Tharangambadi'),(3463,'Sakaleshapura'),(3464,'Lalganj'),(3465,'Malkangiri'),(3466,'Rapar'),(3467,'Mauganj'),(3468,'Todabhim'),(3469,'Srinivaspur'),(3470,'Murliganj'),(3471,'Reengus'),(3472,'Sawantwadi'),(3473,'Tittakudi'),(3474,'Lilong'),(3475,'Rajaldesar'),(3476,'Pathardi'),(3477,'Achhnera'),(3478,'Pacode'),(3479,'Naraura'),(3480,'Nakur'),(3481,'Palai'),(3482,'\"Morinda, India\"'),(3483,'Manasa'),(3484,'Nainpur'),(3485,'Sahaspur'),(3486,'Pauni'),(3487,'Prithvipur'),(3488,'Ramtek'),(3489,'Silapathar'),(3490,'Songadh'),(3491,'Safipur'),(3492,'Sohagpur'),(3493,'Mul'),(3494,'Sadulshahar'),(3495,'Phillaur'),(3496,'Sambhar'),(3497,'Prantij'),(3498,'Nagla'),(3499,'Pattran'),(3500,'Mount Abu'),(3501,'Reoti'),(3502,'Panchla'),(3503,'Sitarganj'),(3504,'Pasighat'),(3505,'Motipur'),(3506,'O\' Valley'),(3507,'Raghunathpur'),(3508,'Suriyampalayam'),(3509,'Qadian'),(3510,'Rairangpur'),(3511,'Silvassa'),(3512,'Mangrol'),(3513,'Soyagaon'),(3514,'Sujanpur'),(3515,'Manihari'),(3516,'Sikanderpur'),(3517,'Mangalvedhe'),(3518,'Phulera'),(3519,'Ron'),(3520,'Sholavandan'),(3521,'Saidpur'),(3522,'Shamgarh'),(3523,'Thammampatti'),(3524,'Maharajpur'),(3525,'Multai'),(3526,'Mukerian'),(3527,'Sirsi'),(3528,'Purwa'),(3529,'Sheohar'),(3530,'Namagiripettai'),(3531,'Parasi'),(3532,'Lathi'),(3533,'Lalganj'),(3534,'Narkhed'),(3535,'Mathabhanga'),(3536,'Shendurjana'),(3537,'Peravurani'),(3538,'Mariani'),(3539,'Phulpur'),(3540,'Rania'),(3541,'Pali'),(3542,'Pachore'),(3543,'Parangipettai'),(3544,'Pudupattinam'),(3545,'Panniyannur'),(3546,'Maharajganj'),(3547,'Rau'),(3548,'Monoharpur'),(3549,'Mandawa'),(3550,'Marigaon'),(3551,'Pallikonda'),(3552,'Pindwara'),(3553,'Shishgarh'),(3554,'Patur'),(3555,'Mayang Imphal'),(3556,'Mhowgaon'),(3557,'Guruvayoor'),(3558,'Mhaswad'),(3559,'Sahawar'),(3560,'Sivagiri'),(3561,'Mundargi'),(3562,'Punjaipugalur'),(3563,'Kailasahar'),(3564,'Samthar'),(3565,'Sakti'),(3566,'Sadalagi'),(3567,'Silao'),(3568,'Mandalgarh'),(3569,'Loha'),(3570,'Pukhrayan'),(3571,'Padmanabhapuram'),(3572,'Belonia'),(3573,'Saiha'),(3574,'Srirampore'),(3575,'Talwara'),(3576,'Puthuppally'),(3577,'Khowai'),(3578,'Vijaypur'),(3579,'Takhatgarh'),(3580,'Thirupuvanam'),(3581,'Adra'),(3582,'Piriyapatna'),(3583,'Obra'),(3584,'Adalaj'),(3585,'Nandgaon'),(3586,'Barh'),(3587,'Chhapra'),(3588,'Panamattom'),(3589,'Niwai'),(3590,'Bageshwar'),(3591,'Tarbha'),(3592,'Adyar'),(3593,'Narsinghgarh'),(3594,'Warud'),(3595,'Asarganj'),(3596,'Sarsod');
/*!40000 ALTER TABLE `location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `location_for_jobs`
--

DROP TABLE IF EXISTS `location_for_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `location_for_jobs` (
  `Jobs_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  PRIMARY KEY (`Jobs_id`,`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `location_for_jobs`
--

LOCK TABLES `location_for_jobs` WRITE;
/*!40000 ALTER TABLE `location_for_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `location_for_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `locations` (
  `Student_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  PRIMARY KEY (`Student_id`,`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locations`
--

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
INSERT INTO `locations` VALUES (2,2400),(2,2403),(2,2426),(3,2401),(3,2415),(4,2409);
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resume`
--

DROP TABLE IF EXISTS `resume`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resume` (
  `resume` varchar(20) NOT NULL,
  `Student_id` int(11) NOT NULL,
  `resume_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`resume_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resume`
--

LOCK TABLES `resume` WRITE;
/*!40000 ALTER TABLE `resume` DISABLE KEYS */;
INSERT INTO `resume` VALUES ('1532260662.pdf',2,1),('1532504726.pdf',3,2),('1533105167.doc',4,3);
/*!40000 ALTER TABLE `resume` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skills`
--

DROP TABLE IF EXISTS `skills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `skill_name` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skills`
--

LOCK TABLES `skills` WRITE;
/*!40000 ALTER TABLE `skills` DISABLE KEYS */;
/*!40000 ALTER TABLE `skills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `specialization`
--

DROP TABLE IF EXISTS `specialization`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `specialization` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `specialization`
--

LOCK TABLES `specialization` WRITE;
/*!40000 ALTER TABLE `specialization` DISABLE KEYS */;
INSERT INTO `specialization` VALUES (1,'Computer Science',1),(2,'Electronics & Communication',1),(3,'Electrical Engineering',1),(4,'Information Technology',1),(5,'Mechanical Engineering',1),(6,'Chemical Engineering',1),(7,'Civil Engineering',1),(8,'Biotechnology',1),(30,'Pharmacy',2),(31,'Biotechnology',3),(32,'Digital Communication',3),(33,'Thermal Engineering',3),(34,'Computer Science',3),(35,'Pharmacology',5),(36,'Pharmaceutics',5);
/*!40000 ALTER TABLE `specialization` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` char(128) NOT NULL,
  `last_phone` varchar(10) DEFAULT NULL,
  `last_resume` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` enum('M','F') DEFAULT NULL,
  `email_verified` tinyint(1) NOT NULL,
  `phone_verified` tinyint(1) NOT NULL,
  `last_location_id` int(11) NOT NULL,
  `no_of_jobs_applied` int(11) NOT NULL DEFAULT '0',
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='Table for students records';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (1,'ashwin.saxena24@gmail.com','B109F3BBBC244EB82441917ED06D618B9008DD09B3BEFD1B5E07394C706A8BB980B1D7785E5976EC049B46DF5F1326AF5A2EA6D103FD07C95385FFAB0CACBC86','8126622339','0','1997-09-24','M',0,0,0,1,'Ashwin Saxena'),(2,'lionelmessi240618@gmail.com','2dfe6706ac8e2c75f51afb2bab74adf7135eb4698306499b48eca77aaca121014c44ed14bd5b6a3f24c1220867cfc5e26d0b33035bffef7b145da6c483ac569c','8126622339','1532260662.pdf',NULL,NULL,0,0,2426,2,'Lionel Messi'),(3,'ashwin.saxena.cs.2015@miet.ac.in','2dfe6706ac8e2c75f51afb2bab74adf7135eb4698306499b48eca77aaca121014c44ed14bd5b6a3f24c1220867cfc5e26d0b33035bffef7b145da6c483ac569c','8126622339',NULL,NULL,NULL,0,0,2401,0,'Ashwin Saxena'),(4,'art@abc.com','2dfe6706ac8e2c75f51afb2bab74adf7135eb4698306499b48eca77aaca121014c44ed14bd5b6a3f24c1220867cfc5e26d0b33035bffef7b145da6c483ac569c','1234567890',NULL,NULL,NULL,0,0,2409,1,'Arti');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_skills`
--

DROP TABLE IF EXISTS `student_skills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_skills` (
  `skills_id` int(11) NOT NULL,
  `Student_id` int(11) NOT NULL,
  PRIMARY KEY (`skills_id`,`Student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_skills`
--

LOCK TABLES `student_skills` WRITE;
/*!40000 ALTER TABLE `student_skills` DISABLE KEYS */;
/*!40000 ALTER TABLE `student_skills` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-01 12:17:04
