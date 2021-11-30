grammar PhpTypes;

typeExpr
    : Identifier (LT typeList GT)?            #SimpleExpr
    | callableType                            #CallableExpr
    | curlyArray                              #CurlyArrayExpr
    | stringLiteral                           #StringLiteralExpr
    | IntLiteral                              #IntLiteralExpr
    | typeExpr Pipe typeExpr (Pipe typeExpr)* #Union
    | typeExpr Amp typeExpr (Amp typeExpr)*   #Intersection
    ;

typeList
    : typeExpr (Comma typeExpr)*
    ;

callableType
    : 'callable' OpenParen typeList? CloseParen (Colon typeExpr)?
    ;

curlyArray
    : 'array{' (curlyArrayEntry Comma)* (curlyArrayEntry Comma?) '}'
    ;

curlyArrayEntry
    : (Identifier optional=QuestionMark? Colon)? typeExpr
    ;

stringLiteral
    : SingleQuote Identifier SingleQuote
    | DoubleQuote Identifier DoubleQuote
    ;

IntLiteral
    : Minus? NonZeroDigit Digit*
    | Zero
    ;

Identifier
    : Letter ((Minus)? [a-zA-Z0-9-])*
    ;

Letter
    : [a-zA-Z]
    ;

Number
    : [1-9] Digit*
    ;

Digit
    : [0-9]
    ;

Minus
    : '-'
    ;

NonZeroDigit
    : [1-9]
    ;

Zero
    : '0'
    ;

WS
    : [ \t\n] -> skip
    ;

LT
    : '<'
    ;

GT
    : '>'
    ;

Comma
    : ','
    ;

Colon
    : ':'
    ;

CurlyOpen
    : '{'
    ;

CurlyClose
    : '}'
    ;

Pipe
    : '|'
    ;

Amp
    : '&'
    ;

OpenParen
    : '('
    ;

CloseParen
    : ')'
    ;

QuestionMark
    : '?'
    ;

SingleQuote
    : '\''
    ;

DoubleQuote
    : '"'
    ;
