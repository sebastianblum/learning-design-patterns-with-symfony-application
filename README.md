# learning design pattern with symfony

Mitschrift:

- UuidInterface verwenden für IDs
- Argument Classes auch *Context nennen
- UrlMatcherInterface, UrlGeneratorInterface vs RouterInterface extends UrlMatcherInterface, UrlGeneratorInterface
- object calisthenics - 9 Regeln anschauen!
    - only one level of indention - nur ein Pfad und einfacher für Tests
    - maximal zwei -> pro Variable - Proxy Methoden verwenden
    - UUID bei mysql nicht als Primärschlüssel verwenden, postgres schon
    - DateTime immer besser als Boolean Fields (am besten darauf verzichten)
    - treat lists as custom collections (keine Arrays) - auch dedicated Listen mit Filtern erstellen (mit Lazy Loading)
    - use value objects - don't have an identity, are responsinve for validating their state, immutable, always valid, are interchangeable
        - public function equals(self $other): bool Methode prüfen
        - https://github.com/moneyphp/money anschauen - Geld immer in Cent speichern
    -     