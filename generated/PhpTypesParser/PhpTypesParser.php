<?php

/*
 * Generated from C:/Users/rgott/Projects/antlr.php-types-parser-for-php\PhpTypes.g4 by ANTLR 4.9.1
 */

namespace PhpTypesParser {
	use Antlr\Antlr4\Runtime\Atn\ATN;
	use Antlr\Antlr4\Runtime\Atn\ATNDeserializer;
	use Antlr\Antlr4\Runtime\Atn\ParserATNSimulator;
	use Antlr\Antlr4\Runtime\Dfa\DFA;
	use Antlr\Antlr4\Runtime\Error\Exceptions\FailedPredicateException;
	use Antlr\Antlr4\Runtime\Error\Exceptions\NoViableAltException;
	use Antlr\Antlr4\Runtime\PredictionContexts\PredictionContextCache;
	use Antlr\Antlr4\Runtime\Error\Exceptions\RecognitionException;
	use Antlr\Antlr4\Runtime\RuleContext;
	use Antlr\Antlr4\Runtime\Token;
	use Antlr\Antlr4\Runtime\TokenStream;
	use Antlr\Antlr4\Runtime\Vocabulary;
	use Antlr\Antlr4\Runtime\VocabularyImpl;
	use Antlr\Antlr4\Runtime\RuntimeMetaData;
	use Antlr\Antlr4\Runtime\Parser;

	final class PhpTypesParser extends Parser
	{
		public const T__0 = 1, T__1 = 2, T__2 = 3, T__3 = 4, T__4 = 5, T__5 = 6, 
               T__6 = 7, T__7 = 8, T__8 = 9, T__9 = 10, T__10 = 11, T__11 = 12, 
               T__12 = 13, IntLiteral = 14, Identifier = 15, Letter = 16, 
               Number = 17, Digit = 18, Minus = 19, NonZeroDigit = 20, Zero = 21, 
               WS = 22;

		public const RULE_typeExpr = 0, RULE_generic = 1, RULE_callableType = 2, 
               RULE_argumentList = 3, RULE_returnType = 4, RULE_curlyArray = 5, 
               RULE_curlyArrayEntry = 6, RULE_stringLiteral = 7;

		/**
		 * @var array<string>
		 */
		public const RULE_NAMES = [
			'typeExpr', 'generic', 'callableType', 'argumentList', 'returnType', 
			'curlyArray', 'curlyArrayEntry', 'stringLiteral'
		];

		/**
		 * @var array<string|null>
		 */
		private const LITERAL_NAMES = [
		    null, "'|'", "'&'", "'<'", "','", "'>'", "'callable('", "')'", "':'", 
		    "'array{'", "'}'", "'?'", "'''", "'\"'", null, null, null, null, null, 
		    "'-'", null, "'0'"
		];

		/**
		 * @var array<string>
		 */
		private const SYMBOLIC_NAMES = [
		    null, null, null, null, null, null, null, null, null, null, null, 
		    null, null, null, "IntLiteral", "Identifier", "Letter", "Number", 
		    "Digit", "Minus", "NonZeroDigit", "Zero", "WS"
		];

		/**
		 * @var string
		 */
		private const SERIALIZED_ATN =
			"\u{3}\u{608B}\u{A72A}\u{8133}\u{B9ED}\u{417C}\u{3BE7}\u{7786}\u{5964}" .
		    "\u{3}\u{18}\u{74}\u{4}\u{2}\u{9}\u{2}\u{4}\u{3}\u{9}\u{3}\u{4}\u{4}" .
		    "\u{9}\u{4}\u{4}\u{5}\u{9}\u{5}\u{4}\u{6}\u{9}\u{6}\u{4}\u{7}\u{9}" .
		    "\u{7}\u{4}\u{8}\u{9}\u{8}\u{4}\u{9}\u{9}\u{9}\u{3}\u{2}\u{3}\u{2}" .
		    "\u{3}\u{2}\u{3}\u{2}\u{3}\u{2}\u{3}\u{2}\u{3}\u{2}\u{5}\u{2}\u{1A}" .
		    "\u{A}\u{2}\u{3}\u{2}\u{3}\u{2}\u{3}\u{2}\u{3}\u{2}\u{3}\u{2}\u{7}" .
		    "\u{2}\u{21}\u{A}\u{2}\u{C}\u{2}\u{E}\u{2}\u{24}\u{B}\u{2}\u{3}\u{2}" .
		    "\u{3}\u{2}\u{3}\u{2}\u{3}\u{2}\u{3}\u{2}\u{7}\u{2}\u{2B}\u{A}\u{2}" .
		    "\u{C}\u{2}\u{E}\u{2}\u{2E}\u{B}\u{2}\u{7}\u{2}\u{30}\u{A}\u{2}\u{C}" .
		    "\u{2}\u{E}\u{2}\u{33}\u{B}\u{2}\u{3}\u{3}\u{3}\u{3}\u{3}\u{3}\u{3}" .
		    "\u{3}\u{3}\u{3}\u{7}\u{3}\u{3A}\u{A}\u{3}\u{C}\u{3}\u{E}\u{3}\u{3D}" .
		    "\u{B}\u{3}\u{3}\u{3}\u{3}\u{3}\u{3}\u{4}\u{3}\u{4}\u{5}\u{4}\u{43}" .
		    "\u{A}\u{4}\u{3}\u{4}\u{3}\u{4}\u{3}\u{4}\u{5}\u{4}\u{48}\u{A}\u{4}" .
		    "\u{3}\u{5}\u{3}\u{5}\u{3}\u{5}\u{7}\u{5}\u{4D}\u{A}\u{5}\u{C}\u{5}" .
		    "\u{E}\u{5}\u{50}\u{B}\u{5}\u{3}\u{6}\u{3}\u{6}\u{3}\u{7}\u{3}\u{7}" .
		    "\u{3}\u{7}\u{3}\u{7}\u{7}\u{7}\u{58}\u{A}\u{7}\u{C}\u{7}\u{E}\u{7}" .
		    "\u{5B}\u{B}\u{7}\u{3}\u{7}\u{3}\u{7}\u{5}\u{7}\u{5F}\u{A}\u{7}\u{3}" .
		    "\u{7}\u{3}\u{7}\u{3}\u{8}\u{3}\u{8}\u{5}\u{8}\u{65}\u{A}\u{8}\u{3}" .
		    "\u{8}\u{5}\u{8}\u{68}\u{A}\u{8}\u{3}\u{8}\u{3}\u{8}\u{3}\u{9}\u{3}" .
		    "\u{9}\u{3}\u{9}\u{3}\u{9}\u{3}\u{9}\u{3}\u{9}\u{5}\u{9}\u{72}\u{A}" .
		    "\u{9}\u{3}\u{9}\u{2}\u{3}\u{2}\u{A}\u{2}\u{4}\u{6}\u{8}\u{A}\u{C}" .
		    "\u{E}\u{10}\u{2}\u{2}\u{2}\u{7D}\u{2}\u{19}\u{3}\u{2}\u{2}\u{2}\u{4}" .
		    "\u{34}\u{3}\u{2}\u{2}\u{2}\u{6}\u{40}\u{3}\u{2}\u{2}\u{2}\u{8}\u{49}" .
		    "\u{3}\u{2}\u{2}\u{2}\u{A}\u{51}\u{3}\u{2}\u{2}\u{2}\u{C}\u{53}\u{3}" .
		    "\u{2}\u{2}\u{2}\u{E}\u{67}\u{3}\u{2}\u{2}\u{2}\u{10}\u{71}\u{3}\u{2}" .
		    "\u{2}\u{2}\u{12}\u{13}\u{8}\u{2}\u{1}\u{2}\u{13}\u{1A}\u{7}\u{11}" .
		    "\u{2}\u{2}\u{14}\u{1A}\u{5}\u{4}\u{3}\u{2}\u{15}\u{1A}\u{5}\u{6}\u{4}" .
		    "\u{2}\u{16}\u{1A}\u{5}\u{C}\u{7}\u{2}\u{17}\u{1A}\u{5}\u{10}\u{9}" .
		    "\u{2}\u{18}\u{1A}\u{7}\u{10}\u{2}\u{2}\u{19}\u{12}\u{3}\u{2}\u{2}" .
		    "\u{2}\u{19}\u{14}\u{3}\u{2}\u{2}\u{2}\u{19}\u{15}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{19}\u{16}\u{3}\u{2}\u{2}\u{2}\u{19}\u{17}\u{3}\u{2}\u{2}\u{2}\u{19}" .
		    "\u{18}\u{3}\u{2}\u{2}\u{2}\u{1A}\u{31}\u{3}\u{2}\u{2}\u{2}\u{1B}\u{1C}" .
		    "\u{C}\u{4}\u{2}\u{2}\u{1C}\u{1D}\u{7}\u{3}\u{2}\u{2}\u{1D}\u{22}\u{5}" .
		    "\u{2}\u{2}\u{2}\u{1E}\u{1F}\u{7}\u{3}\u{2}\u{2}\u{1F}\u{21}\u{5}\u{2}" .
		    "\u{2}\u{2}\u{20}\u{1E}\u{3}\u{2}\u{2}\u{2}\u{21}\u{24}\u{3}\u{2}\u{2}" .
		    "\u{2}\u{22}\u{20}\u{3}\u{2}\u{2}\u{2}\u{22}\u{23}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{23}\u{30}\u{3}\u{2}\u{2}\u{2}\u{24}\u{22}\u{3}\u{2}\u{2}\u{2}\u{25}" .
		    "\u{26}\u{C}\u{3}\u{2}\u{2}\u{26}\u{27}\u{7}\u{4}\u{2}\u{2}\u{27}\u{2C}" .
		    "\u{5}\u{2}\u{2}\u{2}\u{28}\u{29}\u{7}\u{4}\u{2}\u{2}\u{29}\u{2B}\u{5}" .
		    "\u{2}\u{2}\u{2}\u{2A}\u{28}\u{3}\u{2}\u{2}\u{2}\u{2B}\u{2E}\u{3}\u{2}" .
		    "\u{2}\u{2}\u{2C}\u{2A}\u{3}\u{2}\u{2}\u{2}\u{2C}\u{2D}\u{3}\u{2}\u{2}" .
		    "\u{2}\u{2D}\u{30}\u{3}\u{2}\u{2}\u{2}\u{2E}\u{2C}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{2F}\u{1B}\u{3}\u{2}\u{2}\u{2}\u{2F}\u{25}\u{3}\u{2}\u{2}\u{2}\u{30}" .
		    "\u{33}\u{3}\u{2}\u{2}\u{2}\u{31}\u{2F}\u{3}\u{2}\u{2}\u{2}\u{31}\u{32}" .
		    "\u{3}\u{2}\u{2}\u{2}\u{32}\u{3}\u{3}\u{2}\u{2}\u{2}\u{33}\u{31}\u{3}" .
		    "\u{2}\u{2}\u{2}\u{34}\u{35}\u{7}\u{11}\u{2}\u{2}\u{35}\u{36}\u{7}" .
		    "\u{5}\u{2}\u{2}\u{36}\u{3B}\u{5}\u{2}\u{2}\u{2}\u{37}\u{38}\u{7}\u{6}" .
		    "\u{2}\u{2}\u{38}\u{3A}\u{5}\u{2}\u{2}\u{2}\u{39}\u{37}\u{3}\u{2}\u{2}" .
		    "\u{2}\u{3A}\u{3D}\u{3}\u{2}\u{2}\u{2}\u{3B}\u{39}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{3B}\u{3C}\u{3}\u{2}\u{2}\u{2}\u{3C}\u{3E}\u{3}\u{2}\u{2}\u{2}\u{3D}" .
		    "\u{3B}\u{3}\u{2}\u{2}\u{2}\u{3E}\u{3F}\u{7}\u{7}\u{2}\u{2}\u{3F}\u{5}" .
		    "\u{3}\u{2}\u{2}\u{2}\u{40}\u{42}\u{7}\u{8}\u{2}\u{2}\u{41}\u{43}\u{5}" .
		    "\u{8}\u{5}\u{2}\u{42}\u{41}\u{3}\u{2}\u{2}\u{2}\u{42}\u{43}\u{3}\u{2}" .
		    "\u{2}\u{2}\u{43}\u{44}\u{3}\u{2}\u{2}\u{2}\u{44}\u{47}\u{7}\u{9}\u{2}" .
		    "\u{2}\u{45}\u{46}\u{7}\u{A}\u{2}\u{2}\u{46}\u{48}\u{5}\u{A}\u{6}\u{2}" .
		    "\u{47}\u{45}\u{3}\u{2}\u{2}\u{2}\u{47}\u{48}\u{3}\u{2}\u{2}\u{2}\u{48}" .
		    "\u{7}\u{3}\u{2}\u{2}\u{2}\u{49}\u{4E}\u{5}\u{2}\u{2}\u{2}\u{4A}\u{4B}" .
		    "\u{7}\u{6}\u{2}\u{2}\u{4B}\u{4D}\u{5}\u{2}\u{2}\u{2}\u{4C}\u{4A}\u{3}" .
		    "\u{2}\u{2}\u{2}\u{4D}\u{50}\u{3}\u{2}\u{2}\u{2}\u{4E}\u{4C}\u{3}\u{2}" .
		    "\u{2}\u{2}\u{4E}\u{4F}\u{3}\u{2}\u{2}\u{2}\u{4F}\u{9}\u{3}\u{2}\u{2}" .
		    "\u{2}\u{50}\u{4E}\u{3}\u{2}\u{2}\u{2}\u{51}\u{52}\u{5}\u{2}\u{2}\u{2}" .
		    "\u{52}\u{B}\u{3}\u{2}\u{2}\u{2}\u{53}\u{59}\u{7}\u{B}\u{2}\u{2}\u{54}" .
		    "\u{55}\u{5}\u{E}\u{8}\u{2}\u{55}\u{56}\u{7}\u{6}\u{2}\u{2}\u{56}\u{58}" .
		    "\u{3}\u{2}\u{2}\u{2}\u{57}\u{54}\u{3}\u{2}\u{2}\u{2}\u{58}\u{5B}\u{3}" .
		    "\u{2}\u{2}\u{2}\u{59}\u{57}\u{3}\u{2}\u{2}\u{2}\u{59}\u{5A}\u{3}\u{2}" .
		    "\u{2}\u{2}\u{5A}\u{5C}\u{3}\u{2}\u{2}\u{2}\u{5B}\u{59}\u{3}\u{2}\u{2}" .
		    "\u{2}\u{5C}\u{5E}\u{5}\u{E}\u{8}\u{2}\u{5D}\u{5F}\u{7}\u{6}\u{2}\u{2}" .
		    "\u{5E}\u{5D}\u{3}\u{2}\u{2}\u{2}\u{5E}\u{5F}\u{3}\u{2}\u{2}\u{2}\u{5F}" .
		    "\u{60}\u{3}\u{2}\u{2}\u{2}\u{60}\u{61}\u{7}\u{C}\u{2}\u{2}\u{61}\u{D}" .
		    "\u{3}\u{2}\u{2}\u{2}\u{62}\u{64}\u{7}\u{11}\u{2}\u{2}\u{63}\u{65}" .
		    "\u{7}\u{D}\u{2}\u{2}\u{64}\u{63}\u{3}\u{2}\u{2}\u{2}\u{64}\u{65}\u{3}" .
		    "\u{2}\u{2}\u{2}\u{65}\u{66}\u{3}\u{2}\u{2}\u{2}\u{66}\u{68}\u{7}\u{A}" .
		    "\u{2}\u{2}\u{67}\u{62}\u{3}\u{2}\u{2}\u{2}\u{67}\u{68}\u{3}\u{2}\u{2}" .
		    "\u{2}\u{68}\u{69}\u{3}\u{2}\u{2}\u{2}\u{69}\u{6A}\u{5}\u{2}\u{2}\u{2}" .
		    "\u{6A}\u{F}\u{3}\u{2}\u{2}\u{2}\u{6B}\u{6C}\u{7}\u{E}\u{2}\u{2}\u{6C}" .
		    "\u{6D}\u{7}\u{11}\u{2}\u{2}\u{6D}\u{72}\u{7}\u{E}\u{2}\u{2}\u{6E}" .
		    "\u{6F}\u{7}\u{F}\u{2}\u{2}\u{6F}\u{70}\u{7}\u{11}\u{2}\u{2}\u{70}" .
		    "\u{72}\u{7}\u{F}\u{2}\u{2}\u{71}\u{6B}\u{3}\u{2}\u{2}\u{2}\u{71}\u{6E}" .
		    "\u{3}\u{2}\u{2}\u{2}\u{72}\u{11}\u{3}\u{2}\u{2}\u{2}\u{10}\u{19}\u{22}" .
		    "\u{2C}\u{2F}\u{31}\u{3B}\u{42}\u{47}\u{4E}\u{59}\u{5E}\u{64}\u{67}" .
		    "\u{71}";

		protected static $atn;
		protected static $decisionToDFA;
		protected static $sharedContextCache;

		public function __construct(TokenStream $input)
		{
			parent::__construct($input);

			self::initialize();

			$this->interp = new ParserATNSimulator($this, self::$atn, self::$decisionToDFA, self::$sharedContextCache);
		}

		private static function initialize() : void
		{
			if (self::$atn !== null) {
				return;
			}

			RuntimeMetaData::checkVersion('4.9.1', RuntimeMetaData::VERSION);

			$atn = (new ATNDeserializer())->deserialize(self::SERIALIZED_ATN);

			$decisionToDFA = [];
			for ($i = 0, $count = $atn->getNumberOfDecisions(); $i < $count; $i++) {
				$decisionToDFA[] = new DFA($atn->getDecisionState($i), $i);
			}

			self::$atn = $atn;
			self::$decisionToDFA = $decisionToDFA;
			self::$sharedContextCache = new PredictionContextCache();
		}

		public function getGrammarFileName() : string
		{
			return "PhpTypes.g4";
		}

		public function getRuleNames() : array
		{
			return self::RULE_NAMES;
		}

		public function getSerializedATN() : string
		{
			return self::SERIALIZED_ATN;
		}

		public function getATN() : ATN
		{
			return self::$atn;
		}

		public function getVocabulary() : Vocabulary
        {
            static $vocabulary;

			return $vocabulary = $vocabulary ?? new VocabularyImpl(self::LITERAL_NAMES, self::SYMBOLIC_NAMES);
        }

		/**
		 * @throws RecognitionException
		 */
		public function typeExpr() : Context\TypeExprContext
		{
			return $this->recursiveTypeExpr(0);
		}

		/**
		 * @throws RecognitionException
		 */
		private function recursiveTypeExpr(int $precedence) : Context\TypeExprContext
		{
			$parentContext = $this->ctx;
			$parentState = $this->getState();
			$localContext = new Context\TypeExprContext($this->ctx, $parentState);
			$previousContext = $localContext;
			$startState = 0;
			$this->enterRecursionRule($localContext, 0, self::RULE_typeExpr, $precedence);

			try {
				$this->enterOuterAlt($localContext, 1);
				$this->setState(23);
				$this->errorHandler->sync($this);

				switch ($this->getInterpreter()->adaptivePredict($this->input, 0, $this->ctx)) {
					case 1:
					    $localContext = new Context\SimpleExprContext($localContext);
					    $this->ctx = $localContext;
					    $previousContext = $localContext;

					    $this->setState(17);
					    $this->match(self::Identifier);
					break;

					case 2:
					    $localContext = new Context\GenericExprContext($localContext);
					    $this->ctx = $localContext;
					    $previousContext = $localContext;
					    $this->setState(18);
					    $this->generic();
					break;

					case 3:
					    $localContext = new Context\CallableExprContext($localContext);
					    $this->ctx = $localContext;
					    $previousContext = $localContext;
					    $this->setState(19);
					    $this->callableType();
					break;

					case 4:
					    $localContext = new Context\CurlyArrayExprContext($localContext);
					    $this->ctx = $localContext;
					    $previousContext = $localContext;
					    $this->setState(20);
					    $this->curlyArray();
					break;

					case 5:
					    $localContext = new Context\StringLiteralExprContext($localContext);
					    $this->ctx = $localContext;
					    $previousContext = $localContext;
					    $this->setState(21);
					    $this->stringLiteral();
					break;

					case 6:
					    $localContext = new Context\IntLiteralExprContext($localContext);
					    $this->ctx = $localContext;
					    $previousContext = $localContext;
					    $this->setState(22);
					    $this->match(self::IntLiteral);
					break;
				}
				$this->ctx->stop = $this->input->LT(-1);
				$this->setState(47);
				$this->errorHandler->sync($this);

				$alt = $this->getInterpreter()->adaptivePredict($this->input, 4, $this->ctx);

				while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
					if ($alt === 1) {
						if ($this->getParseListeners() !== null) {
						    $this->triggerExitRuleEvent();
						}

						$previousContext = $localContext;
						$this->setState(45);
						$this->errorHandler->sync($this);

						switch ($this->getInterpreter()->adaptivePredict($this->input, 3, $this->ctx)) {
							case 1:
							    $localContext = new Context\UnionContext(new Context\TypeExprContext($parentContext, $parentState));
							    $this->pushNewRecursionContext($localContext, $startState, self::RULE_typeExpr);
							    $this->setState(25);

							    if (!($this->precpred($this->ctx, 2))) {
							        throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 2)");
							    }
							    $this->setState(26);
							    $this->match(self::T__0);
							    $this->setState(27);
							    $this->recursiveTypeExpr(0);
							    $this->setState(32);
							    $this->errorHandler->sync($this);

							    $alt = $this->getInterpreter()->adaptivePredict($this->input, 1, $this->ctx);

							    while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
							    	if ($alt === 1) {
							    		$this->setState(28);
							    		$this->match(self::T__0);
							    		$this->setState(29);
							    		$this->recursiveTypeExpr(0); 
							    	}

							    	$this->setState(34);
							    	$this->errorHandler->sync($this);

							    	$alt = $this->getInterpreter()->adaptivePredict($this->input, 1, $this->ctx);
							    }
							break;

							case 2:
							    $localContext = new Context\IntersectionContext(new Context\TypeExprContext($parentContext, $parentState));
							    $this->pushNewRecursionContext($localContext, $startState, self::RULE_typeExpr);
							    $this->setState(35);

							    if (!($this->precpred($this->ctx, 1))) {
							        throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 1)");
							    }
							    $this->setState(36);
							    $this->match(self::T__1);
							    $this->setState(37);
							    $this->recursiveTypeExpr(0);
							    $this->setState(42);
							    $this->errorHandler->sync($this);

							    $alt = $this->getInterpreter()->adaptivePredict($this->input, 2, $this->ctx);

							    while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
							    	if ($alt === 1) {
							    		$this->setState(38);
							    		$this->match(self::T__1);
							    		$this->setState(39);
							    		$this->recursiveTypeExpr(0); 
							    	}

							    	$this->setState(44);
							    	$this->errorHandler->sync($this);

							    	$alt = $this->getInterpreter()->adaptivePredict($this->input, 2, $this->ctx);
							    }
							break;
						} 
					}

					$this->setState(49);
					$this->errorHandler->sync($this);

					$alt = $this->getInterpreter()->adaptivePredict($this->input, 4, $this->ctx);
				}
			} catch (RecognitionException $exception) {
				$localContext->exception = $exception;
				$this->errorHandler->reportError($this, $exception);
				$this->errorHandler->recover($this, $exception);
			} finally {
				$this->unrollRecursionContexts($parentContext);
			}

			return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function generic() : Context\GenericContext
		{
		    $localContext = new Context\GenericContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 2, self::RULE_generic);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(50);
		        $this->match(self::Identifier);
		        $this->setState(51);
		        $this->match(self::T__2);
		        $this->setState(52);
		        $this->recursiveTypeExpr(0);
		        $this->setState(57);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__3) {
		        	$this->setState(53);
		        	$this->match(self::T__3);
		        	$this->setState(54);
		        	$this->recursiveTypeExpr(0);
		        	$this->setState(59);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(60);
		        $this->match(self::T__4);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function callableType() : Context\CallableTypeContext
		{
		    $localContext = new Context\CallableTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 4, self::RULE_callableType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(62);
		        $this->match(self::T__5);
		        $this->setState(64);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & ((1 << self::T__5) | (1 << self::T__8) | (1 << self::T__11) | (1 << self::T__12) | (1 << self::IntLiteral) | (1 << self::Identifier))) !== 0)) {
		        	$this->setState(63);
		        	$this->argumentList();
		        }
		        $this->setState(66);
		        $this->match(self::T__6);
		        $this->setState(69);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 7, $this->ctx)) {
		            case 1:
		        	    $this->setState(67);
		        	    $this->match(self::T__7);
		        	    $this->setState(68);
		        	    $this->returnType();
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function argumentList() : Context\ArgumentListContext
		{
		    $localContext = new Context\ArgumentListContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 6, self::RULE_argumentList);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(71);
		        $this->recursiveTypeExpr(0);
		        $this->setState(76);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__3) {
		        	$this->setState(72);
		        	$this->match(self::T__3);
		        	$this->setState(73);
		        	$this->recursiveTypeExpr(0);
		        	$this->setState(78);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function returnType() : Context\ReturnTypeContext
		{
		    $localContext = new Context\ReturnTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 8, self::RULE_returnType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(79);
		        $this->recursiveTypeExpr(0);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function curlyArray() : Context\CurlyArrayContext
		{
		    $localContext = new Context\CurlyArrayContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 10, self::RULE_curlyArray);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(81);
		        $this->match(self::T__8);
		        $this->setState(87);
		        $this->errorHandler->sync($this);

		        $alt = $this->getInterpreter()->adaptivePredict($this->input, 9, $this->ctx);

		        while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
		        	if ($alt === 1) {
		        		$this->setState(82);
		        		$this->curlyArrayEntry();
		        		$this->setState(83);
		        		$this->match(self::T__3); 
		        	}

		        	$this->setState(89);
		        	$this->errorHandler->sync($this);

		        	$alt = $this->getInterpreter()->adaptivePredict($this->input, 9, $this->ctx);
		        }

		        $this->setState(90);
		        $this->curlyArrayEntry();
		        $this->setState(92);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__3) {
		        	$this->setState(91);
		        	$this->match(self::T__3);
		        }
		        $this->setState(94);
		        $this->match(self::T__9);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function curlyArrayEntry() : Context\CurlyArrayEntryContext
		{
		    $localContext = new Context\CurlyArrayEntryContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 12, self::RULE_curlyArrayEntry);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(101);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 12, $this->ctx)) {
		            case 1:
		        	    $this->setState(96);
		        	    $this->match(self::Identifier);
		        	    $this->setState(98);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__10) {
		        	    	$this->setState(97);
		        	    	$localContext->optional = $this->match(self::T__10);
		        	    }
		        	    $this->setState(100);
		        	    $this->match(self::T__7);
		        	break;
		        }
		        $this->setState(103);
		        $this->recursiveTypeExpr(0);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function stringLiteral() : Context\StringLiteralContext
		{
		    $localContext = new Context\StringLiteralContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 14, self::RULE_stringLiteral);

		    try {
		        $this->setState(111);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::T__11:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(105);
		            	$this->match(self::T__11);
		            	$this->setState(106);
		            	$this->match(self::Identifier);
		            	$this->setState(107);
		            	$this->match(self::T__11);
		            	break;

		            case self::T__12:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(108);
		            	$this->match(self::T__12);
		            	$this->setState(109);
		            	$this->match(self::Identifier);
		            	$this->setState(110);
		            	$this->match(self::T__12);
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		public function sempred(?RuleContext $localContext, int $ruleIndex, int $predicateIndex) : bool
		{
			switch ($ruleIndex) {
					case 0:
						return $this->sempredTypeExpr($localContext, $predicateIndex);

				default:
					return true;
				}
		}

		private function sempredTypeExpr(?Context\TypeExprContext $localContext, int $predicateIndex) : bool
		{
			switch ($predicateIndex) {
			    case 0:
			        return $this->precpred($this->ctx, 2);

			    case 1:
			        return $this->precpred($this->ctx, 1);
			}

			return true;
		}
	}
}

namespace PhpTypesParser\Context {
	use Antlr\Antlr4\Runtime\ParserRuleContext;
	use Antlr\Antlr4\Runtime\Token;
	use Antlr\Antlr4\Runtime\Tree\ParseTreeVisitor;
	use Antlr\Antlr4\Runtime\Tree\TerminalNode;
	use Antlr\Antlr4\Runtime\Tree\ParseTreeListener;
	use PhpTypesParser\PhpTypesParser;
	use PhpTypesParser\PhpTypesVisitor;
	use PhpTypesParser\PhpTypesListener;

	class TypeExprContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return PhpTypesParser::RULE_typeExpr;
	    }
	 
		public function copyFrom(ParserRuleContext $context) : void
		{
			parent::copyFrom($context);

		}
	}

	class SimpleExprContext extends TypeExprContext
	{
		public function __construct(TypeExprContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function Identifier() : ?TerminalNode
	    {
	        return $this->getToken(PhpTypesParser::Identifier, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof PhpTypesListener) {
			    $listener->enterSimpleExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof PhpTypesListener) {
			    $listener->exitSimpleExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof PhpTypesVisitor) {
			    return $visitor->visitSimpleExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class IntersectionContext extends TypeExprContext
	{
		public function __construct(TypeExprContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    /**
	     * @return array<TypeExprContext>|TypeExprContext|null
	     */
	    public function typeExpr(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(TypeExprContext::class);
	    	}

	        return $this->getTypedRuleContext(TypeExprContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof PhpTypesListener) {
			    $listener->enterIntersection($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof PhpTypesListener) {
			    $listener->exitIntersection($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof PhpTypesVisitor) {
			    return $visitor->visitIntersection($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class GenericExprContext extends TypeExprContext
	{
		public function __construct(TypeExprContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function generic() : ?GenericContext
	    {
	    	return $this->getTypedRuleContext(GenericContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof PhpTypesListener) {
			    $listener->enterGenericExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof PhpTypesListener) {
			    $listener->exitGenericExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof PhpTypesVisitor) {
			    return $visitor->visitGenericExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class IntLiteralExprContext extends TypeExprContext
	{
		public function __construct(TypeExprContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function IntLiteral() : ?TerminalNode
	    {
	        return $this->getToken(PhpTypesParser::IntLiteral, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof PhpTypesListener) {
			    $listener->enterIntLiteralExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof PhpTypesListener) {
			    $listener->exitIntLiteralExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof PhpTypesVisitor) {
			    return $visitor->visitIntLiteralExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class StringLiteralExprContext extends TypeExprContext
	{
		public function __construct(TypeExprContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function stringLiteral() : ?StringLiteralContext
	    {
	    	return $this->getTypedRuleContext(StringLiteralContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof PhpTypesListener) {
			    $listener->enterStringLiteralExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof PhpTypesListener) {
			    $listener->exitStringLiteralExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof PhpTypesVisitor) {
			    return $visitor->visitStringLiteralExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class CurlyArrayExprContext extends TypeExprContext
	{
		public function __construct(TypeExprContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function curlyArray() : ?CurlyArrayContext
	    {
	    	return $this->getTypedRuleContext(CurlyArrayContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof PhpTypesListener) {
			    $listener->enterCurlyArrayExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof PhpTypesListener) {
			    $listener->exitCurlyArrayExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof PhpTypesVisitor) {
			    return $visitor->visitCurlyArrayExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class CallableExprContext extends TypeExprContext
	{
		public function __construct(TypeExprContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function callableType() : ?CallableTypeContext
	    {
	    	return $this->getTypedRuleContext(CallableTypeContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof PhpTypesListener) {
			    $listener->enterCallableExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof PhpTypesListener) {
			    $listener->exitCallableExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof PhpTypesVisitor) {
			    return $visitor->visitCallableExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class UnionContext extends TypeExprContext
	{
		public function __construct(TypeExprContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    /**
	     * @return array<TypeExprContext>|TypeExprContext|null
	     */
	    public function typeExpr(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(TypeExprContext::class);
	    	}

	        return $this->getTypedRuleContext(TypeExprContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof PhpTypesListener) {
			    $listener->enterUnion($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof PhpTypesListener) {
			    $listener->exitUnion($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof PhpTypesVisitor) {
			    return $visitor->visitUnion($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class GenericContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return PhpTypesParser::RULE_generic;
	    }

	    public function Identifier() : ?TerminalNode
	    {
	        return $this->getToken(PhpTypesParser::Identifier, 0);
	    }

	    /**
	     * @return array<TypeExprContext>|TypeExprContext|null
	     */
	    public function typeExpr(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(TypeExprContext::class);
	    	}

	        return $this->getTypedRuleContext(TypeExprContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof PhpTypesListener) {
			    $listener->enterGeneric($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof PhpTypesListener) {
			    $listener->exitGeneric($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof PhpTypesVisitor) {
			    return $visitor->visitGeneric($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class CallableTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return PhpTypesParser::RULE_callableType;
	    }

	    public function argumentList() : ?ArgumentListContext
	    {
	    	return $this->getTypedRuleContext(ArgumentListContext::class, 0);
	    }

	    public function returnType() : ?ReturnTypeContext
	    {
	    	return $this->getTypedRuleContext(ReturnTypeContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof PhpTypesListener) {
			    $listener->enterCallableType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof PhpTypesListener) {
			    $listener->exitCallableType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof PhpTypesVisitor) {
			    return $visitor->visitCallableType($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ArgumentListContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return PhpTypesParser::RULE_argumentList;
	    }

	    /**
	     * @return array<TypeExprContext>|TypeExprContext|null
	     */
	    public function typeExpr(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(TypeExprContext::class);
	    	}

	        return $this->getTypedRuleContext(TypeExprContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof PhpTypesListener) {
			    $listener->enterArgumentList($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof PhpTypesListener) {
			    $listener->exitArgumentList($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof PhpTypesVisitor) {
			    return $visitor->visitArgumentList($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ReturnTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return PhpTypesParser::RULE_returnType;
	    }

	    public function typeExpr() : ?TypeExprContext
	    {
	    	return $this->getTypedRuleContext(TypeExprContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof PhpTypesListener) {
			    $listener->enterReturnType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof PhpTypesListener) {
			    $listener->exitReturnType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof PhpTypesVisitor) {
			    return $visitor->visitReturnType($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class CurlyArrayContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return PhpTypesParser::RULE_curlyArray;
	    }

	    /**
	     * @return array<CurlyArrayEntryContext>|CurlyArrayEntryContext|null
	     */
	    public function curlyArrayEntry(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(CurlyArrayEntryContext::class);
	    	}

	        return $this->getTypedRuleContext(CurlyArrayEntryContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof PhpTypesListener) {
			    $listener->enterCurlyArray($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof PhpTypesListener) {
			    $listener->exitCurlyArray($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof PhpTypesVisitor) {
			    return $visitor->visitCurlyArray($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class CurlyArrayEntryContext extends ParserRuleContext
	{
		/**
		 * @var Token|null $optional
		 */
		public $optional;

		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return PhpTypesParser::RULE_curlyArrayEntry;
	    }

	    public function typeExpr() : ?TypeExprContext
	    {
	    	return $this->getTypedRuleContext(TypeExprContext::class, 0);
	    }

	    public function Identifier() : ?TerminalNode
	    {
	        return $this->getToken(PhpTypesParser::Identifier, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof PhpTypesListener) {
			    $listener->enterCurlyArrayEntry($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof PhpTypesListener) {
			    $listener->exitCurlyArrayEntry($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof PhpTypesVisitor) {
			    return $visitor->visitCurlyArrayEntry($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class StringLiteralContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return PhpTypesParser::RULE_stringLiteral;
	    }

	    public function Identifier() : ?TerminalNode
	    {
	        return $this->getToken(PhpTypesParser::Identifier, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof PhpTypesListener) {
			    $listener->enterStringLiteral($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof PhpTypesListener) {
			    $listener->exitStringLiteral($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof PhpTypesVisitor) {
			    return $visitor->visitStringLiteral($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 
}