---
---
<h1 class="mt-5">Redovisning</h1>
<div id="accordion" class="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <h5 class="mb-0">Kmom01</h5>
        </button>
      </h5>
    </div>
    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body text-left">
        Det känns bra bra att hoppa rakt in i objekt och klasser med PHP. Därför att vi redan var bekanta med den här programmeringsparadigmen från oopython kursen. Däremot hade vi inte använt mycket HTML med python, och nu har vi gjort det på första kursmomentet med PHP.
        <br><br>
        Gissa numret såg hur lätt som helst när Mikael visade hur det skulle se ut. Men det blir mycket svårare när man blir tvungen att följa en sorts mall och samtidigt måste man lösa det på tre olika sätt. Jag fick lite problem med SESSION p.g.a det var ett helt annat sätt att starta om spelet och att spara variablerna. Det var alltså en bra övning.
        <br><br>
        Me-sidan var det inte så enkelt att komma igång. Fick några felmeddelande med Composer och fick installera några PHP extensions. Jag är inte så förtjust i Anax flat, det är lite skrämmande att ha så många mappar och filer som man inte förstår. Även om jag är lite bekant med ramverket känns som att ramverkets "magi" tar aldrig slut.
        <br><br>
        Jag lärde mig att använda SESSION på PHP. Dessutom lärde jag mig mycket mer om "Boostrap 4", eftersom jag har stylat "Gissa numret" och me-sidan med det ramverket. Jag försöker kombinera Anax med Bootstrap och det har gått bra sålängre.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          <h5 class="mb-0">Kmom02</h5>
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body text-left">
      Att överföra spelet gick rätt så bra men det tog längre tid än förväntad. Det var inte lika enkelt som att följa spellistan på Youtube, jag fick andra felmeddelande som jag inte riktigt förstod. Till exempel hade jag fått spelet att vara inuti me-sidan, men samtidigt fick jag 404 Anax not found. Det var lite problem på routern som jag renderade fel.
      <br><br>
      UML kan man använda både innan och efter projektet. Däremot phpDocumentor går bara att skapa när man har väl börjat med projektet. Man måste också ha bra koll på sina docblock kommentarer. Det är lätt hänt att man glömmer att redigera någon docblock och då blir det dokumentationen inte bra.
      <br><br>
      Det är mycket enklare att hantera koden som ligger utanför ramverket. Eller kanske är det smartast att börja skriva kod direkt in i ramverket (om man inte ska flytta den)?. En fördel att skriva den utanför är att om något strular inuti ramverket kan man testa om felet ligger just på ramverket eller själva koden.
      <br><br>
      Båda sätt fungerar. Jag skulle välja att skapa den utanför om det skulle vara en större projekt. Annars hade jag kört direkt in i ramverket.
      <br><br>
      Min TIL är phpDocumentor som är ett riktigt smidigt sätt för att andra ska förstå vår egen kod. Jag tycker bättre om det här sättet än UML. Det ser både snyggare och ordningsamare ut. Men det beror alltså på situationen.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          <h5 class="mb-0">Kmom03</h5>
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        Jag har lite erfarenhet att egen skriva kod som testar annan kod från oopython kursen. Där fick vi lära oss om enhetstester och UML. Det är lite annorlunda på PHP men principen är samma. Att testa varje funktion som finns i en klass.
        <br><br>
        Det är smart att testa varje enhet separat. När man ändrar koden för mycket kan det lätt gå fel. Det är därför bra att kunna köra alla tester och se exakt vart felet ligger. Det kan upplevas lite jobbigt att skriva den testbara koden, men man ska spara mycket tid i längden.
        <br><br>
        White-box testning är när man testar koden inuti källkoden. Man måste alltså ha tillgång till koden för att enhetstesta. Kodtäckningen visar då alla enheter som testas. Det är ett sätt för att andra ska förstå koden utan att läsa den, p.g.a de viktigaste funktionerna testas.
        <br><br>
        Jag återanvände koden från tidigare uppgifter med tärningar och började koda direkt in i ramverket. Behövde endast en klass och lite kod på routern. Det finns två spelare som har vars sin knapp för att kasta tärningarna. Knappen blir "disabled" när det är inte någons tur.
        Dessutom använde jag POST för att skicka formuläret och sparade variablerna i en HTML-element, precis som i Guess uppgiften på kmom01.
        <br><br>
        Jag lyckades få en kodtäckning av 87%. Kunde ha fått 100% men jag hade redan skrivit 5 testfall och det kändes som att det var tillräckligt bra för att kunna få en överblick av koden. Däremot hade jag lite problem att köra make test för att köra testerna. Jag använde då phpunit --configuration .phpunit.xml. Jag nämnde även problemet på Gitter-chatten. Jag gissar att det är något problem med min composer eller phpunit installation.
        <br><br>
        Min TIL är att det är ett annat sätt att tänka när man använder OOP. Det tog en del tanke för att kunna börja att skriva koden när klassen skulle ha nästan all funktionalitet. Det blir en mycket snyggare kod till slut (även om PHP känns alltid lite rörigt).
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingFour">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
          <h5 class="mb-0">Kmom04</h5>
        </button>
      </h5>
    </div>
    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
      <div class="card-body">
        Trait och interface är ett smidigt sätt att använda en sorts arv på PHP. Det tar lite tid innan man skiljer extends, use, trait, interface och sådana nya begrepp. Men efter att ha jobbat med dem på guiden känns det mycket bättre att kunna “ärva” olika klasser.
        <br><br>
        Intelligensen till datorn är enkel men effektiv. Det finns endast två villkor där datorn kommer att sluta rulla. Den första är om “player” har mindre poäng äv vad datorn har och den andra är om player har flera ettor än vad datorn har. I spelet handlar det att sluta rulla när det har gått för bra, därför valde jag att sluta rulla så ofta när motståndaren har mindre chans. Om datorn har mindre poäng kommer den att chansa mycket mer.
        <br><br>
        Ramverkets klasser och struktur är trevligt. Dokumentationen på README.md filerna hjälpte enormt. Koden i routern blev mindre på vissa delar och lite längre på andra. När man gör en "if isset" förväntar man sig en boolean, men ingen funktion i klassen gör det. Fick lägga till en !is_null ganska ofta och det kunde man fixa in i ramverket i stället.
        <br><br>
        Make test fungerar fortfarande inte lokalt. Det har gått något fel på min Ubuntu installation men det går fortfarande att testa med phpunit --configuration .phpunit.xml. Jag gissar att felet ligger endast hos mig med make test.
        <br><br>
        Kodtäckningen blev rätt så bra under "Lines". Över 80% på alla klasser. Däremot under "Classes and traits" lyckades inte jag att få något på några klasser. Det är nog p.g.a jag testar endast med assertEquals och assertContains. Det finns mycket man kan testa med phpUnit.
        <br><br>
        Min TIL är att Anax är lite trevligare än vad jag hade upplevt i andra kurser. När man känner igen katalogerna osv känns det att min workflow är lite snabbare än vanligt. Jag måste också läsa mer om phpunit och fixa felet med Make test (ska installera om Ubuntu och labbmiljön).
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingFive">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
          <h5 class="mb-0">Kmom05</h5>
        </button>
      </h5>
    </div>
    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
      <div class="card-body">
        Övningen visade ett smidigt sätt att kunna hantera routes, sql och vyer. Lätt att ha koll på routern med en switch-sats. Dessutom gillade jag att vi använde både databasen från studentservern och en lokal databas beroende på $_SERVER variabeln. 
        <br><br>
        Att överföra koden in i ramverket var inga problem i början. Med hjälp av rsync fick vi en riktigt bra bas att stöta på. Däremot, mitt största problem var CRUD uppgiften. Jag tyckte att det var konstigt att alla andra routes fungerade utan problem. 
        <br><br>
        Efter flera timmar upptäckte jag att instruktionerna visade hur man integrerar en route med index.php men det var endast med GET. Man måste använda både GET och POST i uppgiften och fick ändra routern till any(["GET", "POST"]). Det hade varit bättre om det stod så på exemplet tycker jag.
        <br><br>
        Min slutprodukt är endast en snyggare tabell och objekt. Jag har stylat dem med Bootstrap och tänkte inte mycket på UX delen. Fokuserade mest på att den tekniska delen skulle fungera utan problem. Jag är medveten att det går att göra mycket mer användarvänligt, men huvudsaken är att allt finns in i ramverket.
        <br><br>
        Min TIL är att lita på mig själv. Jag trodde att det var min egen kod som var fel på CRUD uppgiftern. Felsökte allt möjligt och litade för mycket på ramverket. Man ska alltså kolla hur man använder ramverket. Det är svårt att veta vart felet ligger när man endast får en 404 error. Jag upptäckte felet när jag började läsa dokumentationen till Anax på Github.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingSix">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
          <h5 class="mb-0">Kmom06</h5>
        </button>
      </h5>
    </div>
    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingSeven">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
          <h5 class="mb-0">Kmom07-10</h5>
        </button>
      </h5>
    </div>
    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>
