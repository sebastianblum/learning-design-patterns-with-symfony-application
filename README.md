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

