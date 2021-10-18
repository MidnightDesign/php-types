grammar PhpTypes;

typeExpr
    : Identifier                            #SimpleExpr
    | generic                               #GenericExpr
    | callableType                          #CallableExpr
    | curlyArray                            #CurlyArrayExpr
    | typeExpr '|' typeExpr ('|' typeExpr)* #Union
    | typeExpr '&' typeExpr ('&' typeExpr)* #Intersection
    ;

generic
    : Identifier '<' typeExpr (',' typeExpr)* '>'
    ;

callableType
    : 'callable(' argumentList? ')' (':' returnType)?
    ;

argumentList
    : typeExpr (',' typeExpr)*
    ;

returnType
    : typeExpr
    ;

curlyArray
    : 'array{' (curlyArrayEntry ',')* (curlyArrayEntry ','?) '}'
    ;

curlyArrayEntry
    : (Identifier optional='?'? ':')? typeExpr
    ;

Identifier
    : Letter [a-zA-Z0-9]+
    ;

Letter
    : [a-zA-Z]
    ;

Number
    : [1-9] Digit *
    ;

Digit
    : [0-9]
    ;

WS
    : [ \t\n] -> skip
    ;
