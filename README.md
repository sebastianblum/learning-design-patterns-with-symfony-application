# learning design pattern with symfony

Mitschrift:

SlideDeck von hhamon genauer anschauen!
Was ist DesignPatternBook

- UuidInterface verwenden für IDs
- Argument Classes auch *Context nennen, siehe Symfony ExecutionContext (Validation)
- UrlMatcherInterface, UrlGeneratorInterface vs RouterInterface extends UrlMatcherInterface, UrlGeneratorInterface
- object calisthenics - 9 Regeln anschauen!
    - only one level of indention - nur ein Pfad und einfacher für Tests
    - maximal zwei -> pro Variable - Proxy Methoden verwenden
    - UUID bei mysql nicht als Primärschlüssel verwenden, postgres schon
    - DateTime immer besser als Boolean Fields (am besten darauf verzichten)
    - treat lists as custom collections (keine Arrays) - auch dedicated Listen mit Filtern erstellen (mit Lazy Loading)
    - use value objects - don't have an identity, are responsinve for validating their state, immutable, always valid, are interchangeable
        - public function equals(self $other): bool Methode prüfen
        - https://github.com/moneyphp/money anschauen oder SebastianBergmann\Money\Money - Geld immer in Cent speichern
- AbstractFactory mit Hilfe von FactoryInterface erzeugen
- Builder mit fluent interface (return $this) realisieren, Überüberstellung: Abstract Factory
    - Abstract Factory erzeugen jedes Mal unterschiedliche Objekte
    - Builder erstellen nur beim letzten method call das Objekt
    - Builder sinnvoll, wenn das zu bauende Objekt viele optionale Construtor-Argumente hat, z.B: Route (Symfony)
    - Builder erstellen Immutable Objects
- Adapter verbinden zwei unkompatible Objekte, ohne diese zu ändern. Auch gut für Backward compability und für Legacy Code. z.B. TwigEngineAdapter
- Composite Pattern an Hand Shop Beispiel
- Decorator Pattern siehe HttpKernelInterface sowie HttpKernel und HttpCache
    - HttpCache ändert handle Method 
    - Mittlerweile auch im Service Container (DI) integriert 
    - siehe Vortrag "Implementing Design Patterns with PHP" vom 2. März 2017, Beispiel coupon system
    - Genauer anschauen
- Flyweight interessant für Batchprozesse, sehr performant, z. B. Symfony Form Type Instanzen
    - FormTypes intrinsic - auf keinen Fall einen State injekten: FormFactory: $this->registry->getType($type)
    - FormRegistry ist Flyweight Factory - private $types
    - AbstractExtension genauso Flyweight Factory
    - Symfony FormBuilder extrinsic state
    - Beispiel: FlightRadar, AircraftSerie is FlyWeight, Aircraft verwendet AircraftSeries, Position, Herstelldatum, Nummer
    - FlyWeightFactory enthält static array/list
    - eher wenig interessant für PHP
 
### Behaviour pattern    
    
- Template Pattern: final operation() calls several steps that can be overwritten / are abstract - Hollywood Principle: dont call us, we will call you
    - Doctrine DBAL paginate: AbstractPlatform final public function modifyLimitQuery and add abstract protected function doModifyLimitQuery
    - Symfony Security AbstractAuthenticatorListener: final handle and uses protected attemptAuthentication
    - HttpKernel: private handleRaw and emulates template pattern with event dispatcher(KernelEvents::Request, $event) (pseudo)
- Visitor: Doctrine uses visitor pattern to visit a Schema object graph to validate or generate it
    - Doctrine\DBAL\Schema\Visitor
    - Visitor DropSchemaSqlCollector
    - SingleDatabaseSynchronizer getDropallSchema()
    - Visitor object is only used once, do not reuse   
    - weiteres Beispiel: Doctrine\DBAL\Schema\Visitor\Graphviz 
    - Beispiel im Shop
    
    
Präsentation auf SpeakerDeck    
  

