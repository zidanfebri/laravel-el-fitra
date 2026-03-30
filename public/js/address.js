const addressData = {
    "Jawa Barat": {
        "Kabupaten Bandung": {
            "Arjasari": ["Ancolmekar", "Arjasari", "Baros", "Batukarut", "Lebakwangi", 
                "Mangunjaya", "Mekarjaya", "Patrolsari", "Pinggirsari", "Rancakole", "Wargaluyu"],
            "Baleendah": ["Bojongmalaka", "Malakasari", "Rancamanyar", "Andir", 
                "Baleendah", "Jelekong", "Manggahang", "Wargamekar"],
            "Banjaran": ["Banjaran", "Banjaran Wetan", "Ciapus", "Kamasan", "Kiangroke", 
                "Margahurip", "Mekarjaya", "Neglasari", "Pasirmulya", "Sindangpanon", "Tarajusari"],
            "Bojongsoang": ["Bojongsari", "Bojongsoang", "Buahbatu", "Cipagalo", "Lengkong", "Tegalluar"],
            "Cangkuang": ["Bandasari", "Cangkuang", "Ciluncat", "Jatisari", "Nagrak", "Pananjung", "Tanjungsari"],
            "Cicalengka": ["Babakan Peuteuy", "Cicalengka kulon", "Cicalengka Wetan", "Cikuya", 
                "Dampit", "Margaasih", "Nagrog", "Narawita", "Panenjoan", "Tanjungwangi", "Tenjolaya", "Waluya"],
            "Cikancung": ["Cihanyir", "Cikancung", "Cikasungka", "Ciluluk", "Hegarmanah", "Mandalasari", 
                "Mekarlaksana", "Srirahayu", "Tanjunglaya"],
            "Cilengkrang": ["Cilengkrang", "Cipanjalu", "Ciporeat", "Girimekar", "Jatiendah", "Melatiwangi"],
            "Cileunyi": ["Cibiru Hilir", "Cibiru Wetan", "Cileunyi Kulon", "Cileunyi Wetan", 
                "Cimekar", "Cinunuk"],
            "Cimaung": ["Campakmulya", "Cikalong", "Cimaung", "Cipinang", "Jagabaya", "Malasari", 
                "Mekarsari", "Pasirhuni", "Sukamaju", "Warjabakti"],
            "Cimenyan": ["Ciburial", "Cikadut", "Cimenyan", "Mandalamekar", "Mekarmanik", "Mekarsaluyu", "Sindanglaya",
                "Cibeunying", "Padasuka"],
            "Ciparay": ["Babakan", "Bumiwangi", "Ciheulang", "Cikoneng", "Ciparay", "Gunung Leutik", "Manggungharja",
                "Mekarlaksana", "Mekarsari", "Pakutandang", "Sagaracipta", "Sarimahi", "Serangmekar", "Sumbersari"],
            "Ciwidey": ["Ciwidey", "Lebakmuncang", "Nengkelan", "Panundaan", "Panyocokan", "Rawabogo", "Sukawening"],
            "Dayeuhkolot": ["Cangkuang Kulon", "Cangkuang Wetan", "Citeureup", "Dayeuhkolot", "Sukapura"],
            "Ibun": ["Cibeet", "Dukuh", "Ibun", "Karyalaksana", "Laksana", "Lampegan", "Mekarwangi", "Neglasari", 
                "Pangguh", "Sudi", "Talun", "Tanggulun"],
            "Katapang": ["Banyusari", "Cilampeni", "Gandasari", "Katapang", "Pangauban", "Sangkanhurip", "Sukamukti"],
            "Kertasari": ["Cibeureum", "Cihawuk", "Cikembang", "Neglawangi", "Resmitingal", "Santosa", 
                "Sukapura", "Tarumajaya"],
            "Kutawaringin": ["Buninagara", "Cibodas", "Cilame", "Gajahmekar", "Jatisari", "Jelegong", "Kopo", 
                "Kutawaringin", "Padasuka", "Pameuntasan", "Sukamulya"],
            "Majalaya": ["Biru", "Bojong", "Majakerta", "Majalaya", "Majasetra", "Neglasari", "Padamulya", 
                "Padaulun", "Sukamaju", "Sukamukti", "Wangisagara"],
            "Margaasih": ["Cigondewah Hilir", "Lagadar", "Margaasih", "Mekar Rahayu", "Nanjung", "Rahayu"],
            "Margahayu": ["Margahayu Selatan", "Margahayu Tengah", "Sayati", "Sukamenak", "Sulaeman"],
            "Nagreg": ["Bojong", "Ciaro", "Ciherang", "Citaman", "Ganjarsabar", "Mandalawangi", "Nagreg", "Nagreg Kendan"],
            "Pacet": ["Cikawao", "Cikitu", "Cinanggela", "Cipeujeuh", "Girimulya", "Mandalahaji", "Maruyung",
                "Mekarjaya", "Mekarsari", "Nagrak", "Pangauban", "Sukarame", "Tanjungwangi"],
            "Pameungpeuk": ["Bojongkunci", "Bojongmanggu", "Langonsari", "Rancamulya", "Rancatungku", "Sukasari"],
            "Pangalengan": ["Banjarsari", "Lamajang", "Margaluyu", "Margamekar", "Margamukti", "Margamulya", 
                "Pangalengan", "Pulosari", "Sukaluyu", "Sukamanah", "Tribaktimulya", "Wanasuka", "Warnasari"],
            "Paseh": ["Cigentur", "Cijagra", "Cipaku", "Cipedes", "Drawati", "Karangtunggal", "Loa", "Mekarpawatian",
                "Sindangsari", "Sukamanah", "Sukamantri", "Tangsimekar"],
            "Pasirjambu": ["Cibodas", "Cikoneng", "Cisondari", "Cukanggenteng", "Margamulya", "Mekarmaju", "Mekarsari",
                "Pasirjambu", "Sugihmukti", "Tenjolaya"],
            "Rancabali": ["Alamendah", "Cipelah", "Indragiri", "Patengan", "Sukaresmi"],
            "Rancaekek": ["Bojongloa", "Bojongsalam", "Cangkuang", "Haurpugur", "Jelegong", "Linggar", "Nanjungmekar",
                "Rancaekek Kulon", "Rancaekek Wetan", "Sangiang", "Sukamanah", "Sukamulya", "Tegalsumedang", "Rancaekek Kencana"],
            "Solokanjeruk": ["Bojongemas", "Cibodas", "Langensari", "Padamukti", "Panyadap", "Rancakasumba", "Solokanjeruk"],
            "Soreang": ["Cingcin", "Karamatmulya", "Pamekaran", "Panyirapan", "Parungserab", "Sadu", "Sekarwangi",
                "Soreang", "Sukajadi", "Sukanagara"],
        },
        "Kabupaten Bogor": {
            "Babakan Madang": ["Babakan Madang", "Bojong Koneng", "Cijayanti", "Cipambuan", "Citaringgul", "Kadumangu",
                "Karang Tengah", "Sentul", "Sumur Batu"],
            "Bojonggede": ["Bojong Baru", "Bojonggede", "Cimanggis", "Kedung Waringin", "Ragajaya", "Rawa Panjang", 
                "Susukan", "Waringin Jaya", "Pabuaran"],
            "Caringin": ["Pasir Buncir", "Caringin", "Ciderum", "Ciherang Pondok", "Cimande", "Cimande Hilir",
                "Cinagara", "Lemah duhur", "Muara Jaya", "Pancawati", "Pasir Muncang", "Tangkil"],
            "Cariu": ["Babakan Raden", "Bantar Kuning", "Cariu", "Cibatu Tiga", "Cikutamahi", "Karya Mekar", 
                "Kuta Mekar", "Mekarwangi", "Sukajadi", "Tegal Panjang"],
            "Ciampea": ["Bojong Jengkol", "Bojong Rangkas", "Benteng", "Ciampea", "Ciampea Udik", "Cibadak", 
                "Cibenteng", "Cibuntu", "Cicadas", "Cihideung Ilir", "Cihideung Udik", "Cinangka", "Tegal Waru"],
            "Ciawi": ["Banjar Sari", "Banjar Wangi", "Banjar Waru", "Bendungan", "Bitung Sari", "Bojong Murni",
                "Ciawi", "Cibedug", "Cileungsi", "Citapen", "Jambu Luwuk", "Pandansari", "Teluk Pinang"],
            "Cibinong": ["Cibinong", "Cirimekar", "Ciriung", "Harapan Jaya", "Karadenan", "Nanggewer", "Nanggewer Mekar",
                "Pabuaran", "Pabuaran Mekar", "Pakansari", "Pondok Rajeg", "Sukahati", "Tengah"],
            "Cibungbulang": ["Cemplang", "Ciaruteun Ilir", "Ciaruteun Udik", "Cibatok 1", "Cibatok 2", "Cijujung",
                "Cimanggu 1", "Cimanggu 2", "Dukuh", "Galuga", "Girimulya", "Leuweung Kolot", "Situ Ilir", "Situ Udik",
                "Sukamaju"],
            "Cigombong": ["Ciadeg", "Ciburayut", "Ciburuy", "Cigombong", "Cisalada", "Pasirjaya", "Srogol", "Tugujaya",
                "Watesjaya"],
            "Cigudeg": ["Argapura", "Bangunjaya", "Banyu Asih", "Banyu Resmi", "Banyu Wangi", "Batu Jajar", "Bunar",
                "Cigudeg", "Cintamanik", "Mekarjaya", "Rengasjajar", "Sukamaju", "Sukaraksa", "Tegalega", "Wargajaya"],
            "Cijeruk": ["Cibalung", "Cijeruk", "Cipelang", "Cipicung", "Palasari", "Sukaharja", "Tajur Halang", "Tanjung Sari",
                "Warung Menteng"],
            "Cileungsi": ["Cileungsi", "Cileungsi Kidul", "Cipenjo", "Cipeucang", "Dayeuh", "Gandoang", "Jatisari",
                "Limus Nunggal", "Mampir", "Mekarsari", "Pasir Angin", "Setu Sari"],
            "Ciomas": ["Ciapus", "Ciomas", "Ciomas Rahayu", "Kota Batu", "Laladon", "Mekarjaya", "Pagelaran",
                "Parakan", "Sukaharja", "Sukamakmur", "Padasuka"],
            "Cisarua": ["Batu Layang", "Cibeureum", "Cilember", "Citeko", "Jogjogan", "Kopo", "Leuwimalang", "Tugu Selatan",
                "Tugu Utara", "Cisarua"],
            "Ciseeng": ["Babakan", "Cibeuteung Muara", "Cibeuteung Udik", "Cibentang", "Cihoe", "Ciseeng", "Karihkil",
                "Kuripan", "Parigi Mekar", "Putat Nutug"],
            "Citeureup": ["Citeureup", "Gunung Sari", "Hambalang", "Karang Asem Timur", "Leuwinutug", "Pasir Mukti",
                "Puspasari", "Sanja", "Sukahati", "Tajur", "Tangkil", "Tarikolot", "Karang Asem Barat", "Puspanegara"],
            "Dramaga": ["Babakan", "Ciherang", "Cikarawang", "Dramaga", "Neglasari", "Petir", "Purwasari", "Sinar Sari", 
                "Sukadamai", "Sukawening"],
            "Gunung Putri": ["Bojong Kulur", "Bojong Nangka", "Ciangsana", "Cicadas", "Cikeas Udik", "Gunung Putri",
                "Karanggan", "Nagrak", "Tlajung Udik", "Wanaherang"],
            "Gunungsindur": ["Cibadung", "Cibinong", "Cidokom", "Curug", "Gunung Sindur", "Jampar", "Pabuaran",
                "Padurenan", "Pengasinan", "Rawakalong"],
            "Jasinga": ["Bagoang", "Barengkok", "Cikopomayak", "Curug", "Jasinga", "Jugala Jaya", "Kalongsawah",
                "Koleang", "Neglasari", "Pamagersari", "Pangaur", "Pangradin", "Sipak", "Setu", "Tegal Wangi", "Wirajaya"],
            "Jongol": ["Balekambang", "Bendungan", "Cibodas", "Singajaya", "Singasari", "Sirnagalih", "Sukagalih",
                "Sukajaya", "Sukamaju", "Sukamanah", "Sukanegara", "Sukasirna", "Weninggalih", "Jonggol"],
            "Kemang": ["Bojong", "Jampang", "Kemang", "Pabuaran", "Parakan Jaya", "Pondok Udik", "Semplak Barat",
                "Tegal", "Atang Sanjaya"],
            "Klapanunggal": ["Bantar Jati", "Bojong", "Cikahuripan", "Kembang Kuning", "Klapanunggal", "Leuwikaret",
                "Ligarmukti", "Lulut", "Nambo"],
            "Leuwiliang": ["Berengkok", "Cibeber 1", "Cibeber 2", "Karacak", "Karyasari", "Karehkel", "Leuwiliang",
                "Leuwimekar", "Pabangbon", "Purasari", "Puraseda"],
            "Leuwisadeng": ["Babakan Sedang", "Kalong 1", "Kalong 2", "Leuwisadeng", "Sadeng", "Sadengkolot", "Sibanteng",
                "Wangun Jaya"],
            "Megamendung": ["Cipayung Datar", "Cipayung Girang", "Gadog", "Kuta", "Megamendung", "Pasir Angin",
                "Sukagalih", "Sukakarya", "Sukamahi", "Sukamaju", "Sukamanah", "Sukaresmi"],
            "Nanggung": ["Bantar Karet", "Batu Tulis", "Cisarua", "Curug Bitung", "Hambaro", "Kalong Liud",
                "Malasari", "Nanggung", "Pangkal Jaya", "Parakan Muncang", "Sukaluyu"],
            "Pamijahan": ["Ciasihan", "Ciasmara", "Cibening", "Cibitung Kulon", "Cibitung Wetan", "Cibunian",
                "Cimayang", "Gunung Bunder", "Gunung Bunder 2", "Gunung Menyan", "Gunung Picung", "Pamijahan",
                "Pasarean", "Purwabakati"],
            "Parung": ["Bojong Indah", "Bojong Sempu", "Cogreg", "Iwul", "Jabon Mekar", "Pamegarsari", "Parung",
                "Waru", "Warujaya"],
            "Parung Panjang": ["Cibunar", "Cikuda", "Dago", "Gintung", "Cilejet", "Gorowong", "Jagabaya", "Jagabita",
                "Kabasiran", "Lumpang", "Parung Panjang", "Pingku"],
            "Rancabungur": ["Bantarjaya", "Bantarsari", "Candali", "Cimulang", "Mekarsari", "Pasirgaok", "Rancabungur"],
            "Rumpin": ["Cibodas", "Cipinang", "Gobang", "Kampung Sawah", "Kertajaya", "Leuwibatu",
                "Mekar Jaya", "Mekar Sari", "Rabak", "Rumpin", "Sukamulya", "Sukasari", "Taman Sari"],
            "Sukajaya": ["Cileuksa", "Cisarua", "Harkatjaya", "Kiarapandak", "Kiarasari", "Pasir Madang",
                "Sipayung", "Sukaraja", "Sukamulih", "Jaya Raharja", "Urug"],
            "Sukamakmur": ["Cibadak", "Pabuaran", "Sirnajaya", "Sukadamai", "Sukaharja", "Sukamakmur", "Sukamulya",
                "Sukaresmi", "Sukawangi", "Wargajaya"],
            "Sukaraja": ["Cadas Ngampar", "Cibanon", "Cijujung", "Cikeas", "Cilebut Barat", "Cilebut Timur", "Cimandala",
                "Gunung Geulis", "Nagrak", "Pasir Jambu", "Pasirlaja", "Sukaraja", "Sukatani"],
            "Tajurhalang": ["Citayam", "Kalisuren", "Nanggerang", "Sasak Panjang", "Sukmajaya", "Tajurhalang", "Tojong"],
            "Tamansari": ["Pasireurih", "Sirnagalih", "Sukajadi", "Sukajaya", "Sukaluyu", "Sukamantri", "Sukaresmi",
                "Tamansari"],
            "Tanjungsari": ["Antajaya", "Buanajaya", "Cibadak", "Pasir Tanjung", "Selawangi", "Sirnarasa", "Sukarasa",
                "Tanjungrasa", "Tanjungsari"],
            "Tenjo": ["Babakan", "Batok", "Bojong", "Cilaku", "Ciomas", "Singabangsa", "Singabraja", "Tapos", "Tenjo"],
            "Tenjolaya": ["Cibitung Tengah", "Cinangneng", "Gunung Malang", "Gunung Mulya", "Situ Daun", "Tapos 1", "Tapos 2"],
        },
        "Kabupaten Sukabumi": {
            "Bantargadung": ["Bantargadung", "Bantargerbang", "Bojonggaling", "Boyongsari", "Buanajaya", "Limusnunggal",
                "Mangunjaya"],
        },
        "Kota Bandung": {
            "Andir": ["Cempaka", "Ciroyom", "Dunguscariang", "Garuda", "Kebonjeruk", "Maleber"],
            "Astana Anyar": ["Cibadak", "Karanganyar", "Karasak", "Nyengseret", "Panjunan", "Pelindunghewan"],
            "Antapani": ["Antapani Kidul", "Antapani Kulon", "Antapani Tengah", "Antapani Wetan"],
            "Arcamanik": ["Cisaranten Bina Harapan", "Cisaranten Endah", "Cisaranten Kulon", "Sukamiskin"],
            "Babakan Ciparay": ["Babakan", "Babakanciparay", "Cirangrang", "Margahayu Utara", "Margasuka", "Sukahaji"],
            "Bandung Kidul": ["Batununggal", "Kujangsari", "Mengger", "Wates"],
            "Bandung Kulon": ["Caringin", "Cibuntu", "Cigondewah Kaler", "Cigondewah Kidul", "Cigondewah Rahayu", "Cijerah", "Gempolsari", "Warungmuncang"],
            "Bandung Wetan": ["Cihapit", "Citarum", "Tamansari"],
            "Batununggal": ["Binong", "Cibangkong", "Gumuruh", "Kacapiring", "Kebongedang", "Kebonwaru", "Maleer", "Samoja"],
            "Bojongloa Kaler": ["Babakan Asih", "Babakan Tarogong", "Jamika", "Kopo", "Suka Asih"],
            "Bojongloa Kidul": ["Cibaduyut", "Cibaduyut Kidul", "Cibaduyut Wetan", "Kebon Lega", "Mekarwangi", "Situsaeur"],
            "Buahbatu": ["Cijawura", "Jatisari", "Margasari", "Sekejati"],
            "Cibeunying Kaler": ["Cigadung", "Sukaluyu", "Cihaur Geulis", "Neglasari"],
            "Cibeunying Kidul": ["Padasuka", "Sukamaju", "Cicadas", "Cikutra", "Pasirlayung", "Sukapada"],
            "Cibiru": ["Cipadung", "Cisurupan", "Palasari", "Pasirbiru"],
            "Cicendo": ["Arjuna", "Husen Sastranegara", "Pajajaran", "Pamoyanan", "Pasirkaliki", "Sukaraja"],
            "Cicadap": ["Ciumbuleuit", "Hegarmanah", "Ledeng"],
            "Cinambo": ["Babakan Penghulu", "Cisaranten Wetan", "Pakemitan", "Sukamulya"],
            "Coblong": ["Cipaganti", "Dago", "Lebakgede", "Lebaksiliwangi", "Sadangserang", "Sekeloa"],
            "Gedebage": ["Cimincrang", "Cisaranten Kidul", "Rancanbolang", "Rancanumpang"],
            "Kiaracondong": ["Babakansari", "Babakansurabaya", "Cicaheum", "Kebonkangkung", "Kebunjayanti", "Sukapura"],
            "Lengkong": ["Burangrang", "Cijagra", "Cikawao", "Lingkar Selatan", "Malabar", "Paledang", "Turangga"],
            "Mandalajati": ["Jatihandap", "Karangpamulang", "Pasir Impun", "Sindangjaya"],
            "Panyileukan": ["Cipadung Kidul", "Cipadung Kulon", "Cipadung Wetan", "Mekarmulya"],
            "Rancasari": ["Cisurupan", "Palasari", "Pasirbiru"],
            "Regol": ["Ancol", "Balonggede", "Ciateul", "Cigelereng", "Ciseureuh", "Pasirluyu", "Pungkur"],
            "Sukajadi": ["Cipedes", "Pasteur", "Sukabungah", "Sukagalih", "Sukawarna"],
            "Sukasari": ["Gegerkalong", "Isola", "Sarijadi", "Sukarasa"],
            "Sumur Bandung": ["Babakanciamis", "Braga", "Kebonpisang", "Merdeka"],
            "Ujung Berung": ["Cigending", "Pasanggarahan", "Pasirendah", "Pasirjati", "Pasirwangi"],
        },
        "Kota Bogor": {
            "Bogor Barat": ["Balungbangjaya", "Bubulak", "Cilendek Barat", "Cilendek Timur", "Curug", "Curugmekar", 
                "Gunungbatu", "Loji", "Margajaya", "Menteng", "Pasirjaya", "Pasirkuda", "Pasirmulya", "Semplak", 
                "Sindangbarang", "Situgede"],
            "Bogor Selatan": ["Batutulis", "Bojongkerta", "Bondongan", "Cikaret", "Cipaku", "Empang", "Genteng", 
                "Harjasari", "Kertamaya", "Lawanggintung", "Muarasari", "Mulyaharja", "Pakuan", "Pamoyanan", 
                "Rancamaya", "Ranggamekar"],
            "Bogor Tengah": ["Babakan", "Babakanpasar", "Cibogor", "Ciwaringin", "Gudang", "Kebonkelapa", "Pabaton",
                "Paledang", "Panaragan", "Sempur", "Tegallega"],
            "Bogor Timur": ["Baranangsiang", "Katulampa", "Sindangrasa", "Sindangsari", "Sukasari", "Tajur"],
            "Bogor Utara": ["Bantarjati", "Cibuluh", "Ciluar", "Cimahpar", "Ciparigi", "Kedunghalang", "Tanahbaru",
                "Tegalgundil"],
            "Tanah Sareal": ["Cibadak", "Kayumanis", "Kebonpedes", "Kedungbadak", "Kedungjaya", "Kedungwaringin", 
                "Kencana", "Mekarwangi", "Sukadamai", "Sukaresmi", "TanahSareal"],
        },
        "Kota Sukabumi": {
            "Baros": ["Baros", "Jayamekar", "Jayaraksa", "Sudajaya Hilir"],
            "Cibeureum": ["Babakan", "Cibeureumhilir", "Limusnunggal", "Sindangpalay"],
            "Cikole": ["Cikole", "Cisarua", "Gunungparang", "Kebonjati", "Selabatu", "Subangjaya"],
            "Citamiang": ["Cikondang", "Citamiang", "Gedongpanjang", "Nanggeleng", "Tipar"],
            "Gunungpuyuh": ["Gunungpuyuh", "Karamat", "Karangtengah", "Sriwidari"],
            "Lembursitu": ["Cikundul", "Cipanengah", "Lembursitu", "Sindangsari", "Situmekar"],
            "Warudoyong": ["Benteng", "Dayeuhluhur", "Nyomplong", "Sukakarya", "Warudoyong"],
        }
    },
    "Jawa Timur": {
        "Surabaya": {
            "Gubeng": ["Kertajaya", "Pucang Sewu", "Airlangga"],
            "Tegalsari": ["Kedungdoro", "Dr. Soetomo", "Keputran"],
        },
        "Malang": {
            "Klojen": ["Sukoharjo", "Kasin", "Oro-oro Dowo"],
            "Lowokwaru": ["Tulusrejo", "Mojolangu", "Sumbersari"],
        }
    }
};

document.addEventListener('DOMContentLoaded', function () {
    const provinsiSelect = document.getElementById('provinsi');
    const kotaSelect = document.getElementById('kota');
    const kecamatanSelect = document.getElementById('kecamatan');
    const kelurahanSelect = document.getElementById('kelurahan');

    const provinsiManualDiv = document.getElementById('provinsi_manual');
    const kotaManualDiv = document.getElementById('kota_manual');
    const kecamatanManualDiv = document.getElementById('kecamatan_manual');
    const kelurahanManualDiv = document.getElementById('kelurahan_manual');

    const provinsiManualInput = document.getElementById('provinsi_manual_input');
    const kotaManualInput = document.getElementById('kota_manual_input');
    const kecamatanManualInput = document.getElementById('kecamatan_manual_input');
    const kelurahanManualInput = document.getElementById('kelurahan_manual_input');

    // Function to add "Lainnya" option
    function addLainnyaOption(selectElement) {
        const lainnyaOption = document.createElement('option');
        lainnyaOption.value = 'lainnya';
        lainnyaOption.text = 'Lainnya';
        selectElement.appendChild(lainnyaOption);
    }

    // Function to populate dropdown with only "Lainnya" option
    function populateOnlyLainnya(selectElement, placeholderText) {
        selectElement.innerHTML = `<option value="">${placeholderText}</option>`;
        addLainnyaOption(selectElement);
    }

    // Populate provinsi dropdown with unique entries
    provinsiSelect.innerHTML = '<option value="">Pilih Provinsi</option>';
    const provinces = [...new Set(Object.keys(addressData))];
    provinces.forEach(provinsi => {
        const option = document.createElement('option');
        option.value = provinsi;
        option.text = provinsi;
        provinsiSelect.appendChild(option);
    });
    addLainnyaOption(provinsiSelect);

    // Handle provinsi change
    provinsiSelect.addEventListener('change', function () {
        // Reset downstream dropdowns
        kotaSelect.innerHTML = '<option value="">Pilih Kota</option>';
        kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
        kelurahanSelect.innerHTML = '<option value="">Pilih Kelurahan</option>';

        kotaManualDiv.style.display = 'none';
        kecamatanManualDiv.style.display = 'none';
        kelurahanManualDiv.style.display = 'none';

        kotaManualInput.name = '';
        kecamatanManualInput.name = '';
        kelurahanManualInput.name = '';

        kotaSelect.name = 'kota_select';
        kecamatanSelect.name = 'kecamatan_select';
        kelurahanSelect.name = 'kelurahan_select';

        if (this.value === 'lainnya') {
            provinsiManualDiv.style.display = 'block';
            provinsiManualInput.name = 'provinsi';
            this.name = '';
            populateOnlyLainnya(kotaSelect, 'Pilih Kota');
        } else if (this.value && addressData[this.value]) {
            provinsiManualDiv.style.display = 'none';
            provinsiManualInput.name = '';
            this.name = 'provinsi_select';
            const cities = [...new Set(Object.keys(addressData[this.value]))];
            cities.forEach(kota => {
                const option = document.createElement('option');
                option.value = kota;
                option.text = kota;
                kotaSelect.appendChild(option);
            });
            addLainnyaOption(kotaSelect);
        }
    });

    // Handle kota change
    kotaSelect.addEventListener('change', function () {
        kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
        kelurahanSelect.innerHTML = '<option value="">Pilih Kelurahan</option>';

        kecamatanManualDiv.style.display = 'none';
        kelurahanManualDiv.style.display = 'none';

        kecamatanManualInput.name = '';
        kelurahanManualInput.name = '';

        kecamatanSelect.name = 'kecamatan_select';
        kelurahanSelect.name = 'kelurahan_select';

        const provinsiVal = provinsiSelect.value;
        if (this.value === 'lainnya' || provinsiVal === 'lainnya') {
            kotaManualDiv.style.display = 'block';
            kotaManualInput.name = 'kota';
            this.name = '';
            populateOnlyLainnya(kecamatanSelect, 'Pilih Kecamatan');
        } else if (this.value && provinsiVal && addressData[provinsiVal] && addressData[provinsiVal][this.value]) {
            kotaManualDiv.style.display = 'none';
            kotaManualInput.name = '';
            this.name = 'kota_select';
            const kecamatans = [...new Set(Object.keys(addressData[provinsiVal][this.value]))];
            kecamatans.forEach(kecamatan => {
                const option = document.createElement('option');
                option.value = kecamatan;
                option.text = kecamatan;
                kecamatanSelect.appendChild(option);
            });
            addLainnyaOption(kecamatanSelect);
        }
    });

    // Handle kecamatan change
    kecamatanSelect.addEventListener('change', function () {
        kelurahanSelect.innerHTML = '<option value="">Pilih Kelurahan</option>';

        kelurahanManualDiv.style.display = 'none';
        kelurahanManualInput.name = '';
        kelurahanSelect.name = 'kelurahan_select';

        const provinsiVal = provinsiSelect.value;
        const kotaVal = kotaSelect.value;
        if (this.value === 'lainnya' || provinsiVal === 'lainnya' || kotaVal === 'lainnya') {
            kecamatanManualDiv.style.display = 'block';
            kecamatanManualInput.name = 'kecamatan';
            this.name = '';
            populateOnlyLainnya(kelurahanSelect, 'Pilih Kelurahan');
        } else if (this.value && provinsiVal && kotaVal && addressData[provinsiVal][kotaVal] && addressData[provinsiVal][kotaVal][this.value]) {
            kecamatanManualDiv.style.display = 'none';
            kecamatanManualInput.name = '';
            this.name = 'kecamatan_select';
            const kelurahans = [...new Set(addressData[provinsiVal][kotaVal][this.value])];
            kelurahans.forEach(kelurahan => {
                const option = document.createElement('option');
                option.value = kelurahan;
                option.text = kelurahan;
                kelurahanSelect.appendChild(option);
            });
            addLainnyaOption(kelurahanSelect);
        }
    });

    // Handle kelurahan change
    kelurahanSelect.addEventListener('change', function () {
        const provinsiVal = provinsiSelect.value;
        const kotaVal = kotaSelect.value;
        const kecamatanVal = kecamatanSelect.value;
        if (this.value === 'lainnya' || provinsiVal === 'lainnya' || kotaVal === 'lainnya' || kecamatanVal === 'lainnya') {
            kelurahanManualDiv.style.display = 'block';
            kelurahanManualInput.name = 'kelurahan';
            this.name = '';
        } else {
            kelurahanManualDiv.style.display = 'none';
            kelurahanManualInput.name = '';
            this.name = 'kelurahan_select';
        }
    });
});