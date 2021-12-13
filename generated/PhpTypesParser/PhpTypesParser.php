<?php

/*
 * Generated from C:/Users/rgott/Projects/php-types\PhpTypes.g4 by ANTLR 4.9.2
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
		public const T__0 = 1, T__1 = 2, IntLiteral = 3, Identifier = 4, Letter = 5, 
               Number = 6, Digit = 7, Minus = 8, NonZeroDigit = 9, Zero = 10, 
               WS = 11, LT = 12, GT = 13, Comma = 14, Colon = 15, CurlyOpen = 16, 
               CurlyClose = 17, Pipe = 18, Amp = 19, OpenParen = 20, CloseParen = 21, 
               QuestionMark = 22, SingleQuote = 23, DoubleQuote = 24;

		public const RULE_typeExpr = 0, RULE_typeList = 1, RULE_callableType = 2, 
               RULE_curlyArray = 3, RULE_curlyArrayEntry = 4, RULE_stringLiteral = 5;

		/**
		 * @var array<string>
		 */
		public const RULE_NAMES = [
			'typeExpr', 'typeList', 'callableType', 'curlyArray', 'curlyArrayEntry', 
			'stringLiteral'
		];

		/**
		 * @var array<string|null>
		 */
		private const LITERAL_NAMES = [
		    null, "'callable'", "'array{'", null, null, null, null, null, "'-'", 
		    null, "'0'", null, "'<'", "'>'", "','", "':'", "'{'", "'}'", "'|'", 
		    "'&'", "'('", "')'", "'?'", "'''", "'\"'"
		];

		/**
		 * @var array<string>
		 */
		private const SYMBOLIC_NAMES = [
		    null, null, null, "IntLiteral", "Identifier", "Letter", "Number", 
		    "Digit", "Minus", "NonZeroDigit", "Zero", "WS", "LT", "GT", "Comma", 
		    "Colon", "CurlyOpen", "CurlyClose", "Pipe", "Amp", "OpenParen", "CloseParen", 
		    "QuestionMark", "SingleQuote", "DoubleQuote"
		];

		/**
		 * @var string
		 */
		private const SERIALIZED_ATN =
			"\u{3}\u{608B}\u{A72A}\u{8133}\u{B9ED}\u{417C}\u{3BE7}\u{7786}\u{5964}" .
		    "\u{3}\u{1A}\u{70}\u{4}\u{2}\u{9}\u{2}\u{4}\u{3}\u{9}\u{3}\u{4}\u{4}" .
		    "\u{9}\u{4}\u{4}\u{5}\u{9}\u{5}\u{4}\u{6}\u{9}\u{6}\u{4}\u{7}\u{9}" .
		    "\u{7}\u{3}\u{2}\u{3}\u{2}\u{3}\u{2}\u{3}\u{2}\u{3}\u{2}\u{3}\u{2}" .
		    "\u{3}\u{2}\u{3}\u{2}\u{3}\u{2}\u{3}\u{2}\u{5}\u{2}\u{19}\u{A}\u{2}" .
		    "\u{3}\u{2}\u{3}\u{2}\u{3}\u{2}\u{3}\u{2}\u{5}\u{2}\u{1F}\u{A}\u{2}" .
		    "\u{3}\u{2}\u{3}\u{2}\u{3}\u{2}\u{3}\u{2}\u{3}\u{2}\u{7}\u{2}\u{26}" .
		    "\u{A}\u{2}\u{C}\u{2}\u{E}\u{2}\u{29}\u{B}\u{2}\u{3}\u{2}\u{3}\u{2}" .
		    "\u{3}\u{2}\u{3}\u{2}\u{3}\u{2}\u{7}\u{2}\u{30}\u{A}\u{2}\u{C}\u{2}" .
		    "\u{E}\u{2}\u{33}\u{B}\u{2}\u{7}\u{2}\u{35}\u{A}\u{2}\u{C}\u{2}\u{E}" .
		    "\u{2}\u{38}\u{B}\u{2}\u{3}\u{3}\u{3}\u{3}\u{3}\u{3}\u{7}\u{3}\u{3D}" .
		    "\u{A}\u{3}\u{C}\u{3}\u{E}\u{3}\u{40}\u{B}\u{3}\u{3}\u{4}\u{3}\u{4}" .
		    "\u{3}\u{4}\u{5}\u{4}\u{45}\u{A}\u{4}\u{3}\u{4}\u{3}\u{4}\u{3}\u{4}" .
		    "\u{5}\u{4}\u{4A}\u{A}\u{4}\u{3}\u{5}\u{3}\u{5}\u{3}\u{5}\u{3}\u{5}" .
		    "\u{7}\u{5}\u{50}\u{A}\u{5}\u{C}\u{5}\u{E}\u{5}\u{53}\u{B}\u{5}\u{3}" .
		    "\u{5}\u{3}\u{5}\u{5}\u{5}\u{57}\u{A}\u{5}\u{3}\u{5}\u{3}\u{5}\u{3}" .
		    "\u{6}\u{3}\u{6}\u{5}\u{6}\u{5D}\u{A}\u{6}\u{3}\u{6}\u{5}\u{6}\u{60}" .
		    "\u{A}\u{6}\u{3}\u{6}\u{3}\u{6}\u{3}\u{7}\u{3}\u{7}\u{5}\u{7}\u{66}" .
		    "\u{A}\u{7}\u{3}\u{7}\u{3}\u{7}\u{3}\u{7}\u{5}\u{7}\u{6B}\u{A}\u{7}" .
		    "\u{3}\u{7}\u{5}\u{7}\u{6E}\u{A}\u{7}\u{3}\u{7}\u{2}\u{3}\u{2}\u{8}" .
		    "\u{2}\u{4}\u{6}\u{8}\u{A}\u{C}\u{2}\u{2}\u{2}\u{7D}\u{2}\u{1E}\u{3}" .
		    "\u{2}\u{2}\u{2}\u{4}\u{39}\u{3}\u{2}\u{2}\u{2}\u{6}\u{41}\u{3}\u{2}" .
		    "\u{2}\u{2}\u{8}\u{4B}\u{3}\u{2}\u{2}\u{2}\u{A}\u{5F}\u{3}\u{2}\u{2}" .
		    "\u{2}\u{C}\u{6D}\u{3}\u{2}\u{2}\u{2}\u{E}\u{F}\u{8}\u{2}\u{1}\u{2}" .
		    "\u{F}\u{10}\u{7}\u{16}\u{2}\u{2}\u{10}\u{11}\u{5}\u{2}\u{2}\u{2}\u{11}" .
		    "\u{12}\u{7}\u{17}\u{2}\u{2}\u{12}\u{1F}\u{3}\u{2}\u{2}\u{2}\u{13}" .
		    "\u{18}\u{7}\u{6}\u{2}\u{2}\u{14}\u{15}\u{7}\u{E}\u{2}\u{2}\u{15}\u{16}" .
		    "\u{5}\u{4}\u{3}\u{2}\u{16}\u{17}\u{7}\u{F}\u{2}\u{2}\u{17}\u{19}\u{3}" .
		    "\u{2}\u{2}\u{2}\u{18}\u{14}\u{3}\u{2}\u{2}\u{2}\u{18}\u{19}\u{3}\u{2}" .
		    "\u{2}\u{2}\u{19}\u{1F}\u{3}\u{2}\u{2}\u{2}\u{1A}\u{1F}\u{5}\u{6}\u{4}" .
		    "\u{2}\u{1B}\u{1F}\u{5}\u{8}\u{5}\u{2}\u{1C}\u{1F}\u{5}\u{C}\u{7}\u{2}" .
		    "\u{1D}\u{1F}\u{7}\u{5}\u{2}\u{2}\u{1E}\u{E}\u{3}\u{2}\u{2}\u{2}\u{1E}" .
		    "\u{13}\u{3}\u{2}\u{2}\u{2}\u{1E}\u{1A}\u{3}\u{2}\u{2}\u{2}\u{1E}\u{1B}" .
		    "\u{3}\u{2}\u{2}\u{2}\u{1E}\u{1C}\u{3}\u{2}\u{2}\u{2}\u{1E}\u{1D}\u{3}" .
		    "\u{2}\u{2}\u{2}\u{1F}\u{36}\u{3}\u{2}\u{2}\u{2}\u{20}\u{21}\u{C}\u{4}" .
		    "\u{2}\u{2}\u{21}\u{22}\u{7}\u{14}\u{2}\u{2}\u{22}\u{27}\u{5}\u{2}" .
		    "\u{2}\u{2}\u{23}\u{24}\u{7}\u{14}\u{2}\u{2}\u{24}\u{26}\u{5}\u{2}" .
		    "\u{2}\u{2}\u{25}\u{23}\u{3}\u{2}\u{2}\u{2}\u{26}\u{29}\u{3}\u{2}\u{2}" .
		    "\u{2}\u{27}\u{25}\u{3}\u{2}\u{2}\u{2}\u{27}\u{28}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{28}\u{35}\u{3}\u{2}\u{2}\u{2}\u{29}\u{27}\u{3}\u{2}\u{2}\u{2}\u{2A}" .
		    "\u{2B}\u{C}\u{3}\u{2}\u{2}\u{2B}\u{2C}\u{7}\u{15}\u{2}\u{2}\u{2C}" .
		    "\u{31}\u{5}\u{2}\u{2}\u{2}\u{2D}\u{2E}\u{7}\u{15}\u{2}\u{2}\u{2E}" .
		    "\u{30}\u{5}\u{2}\u{2}\u{2}\u{2F}\u{2D}\u{3}\u{2}\u{2}\u{2}\u{30}\u{33}" .
		    "\u{3}\u{2}\u{2}\u{2}\u{31}\u{2F}\u{3}\u{2}\u{2}\u{2}\u{31}\u{32}\u{3}" .
		    "\u{2}\u{2}\u{2}\u{32}\u{35}\u{3}\u{2}\u{2}\u{2}\u{33}\u{31}\u{3}\u{2}" .
		    "\u{2}\u{2}\u{34}\u{20}\u{3}\u{2}\u{2}\u{2}\u{34}\u{2A}\u{3}\u{2}\u{2}" .
		    "\u{2}\u{35}\u{38}\u{3}\u{2}\u{2}\u{2}\u{36}\u{34}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{36}\u{37}\u{3}\u{2}\u{2}\u{2}\u{37}\u{3}\u{3}\u{2}\u{2}\u{2}\u{38}" .
		    "\u{36}\u{3}\u{2}\u{2}\u{2}\u{39}\u{3E}\u{5}\u{2}\u{2}\u{2}\u{3A}\u{3B}" .
		    "\u{7}\u{10}\u{2}\u{2}\u{3B}\u{3D}\u{5}\u{2}\u{2}\u{2}\u{3C}\u{3A}" .
		    "\u{3}\u{2}\u{2}\u{2}\u{3D}\u{40}\u{3}\u{2}\u{2}\u{2}\u{3E}\u{3C}\u{3}" .
		    "\u{2}\u{2}\u{2}\u{3E}\u{3F}\u{3}\u{2}\u{2}\u{2}\u{3F}\u{5}\u{3}\u{2}" .
		    "\u{2}\u{2}\u{40}\u{3E}\u{3}\u{2}\u{2}\u{2}\u{41}\u{42}\u{7}\u{3}\u{2}" .
		    "\u{2}\u{42}\u{44}\u{7}\u{16}\u{2}\u{2}\u{43}\u{45}\u{5}\u{4}\u{3}" .
		    "\u{2}\u{44}\u{43}\u{3}\u{2}\u{2}\u{2}\u{44}\u{45}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{45}\u{46}\u{3}\u{2}\u{2}\u{2}\u{46}\u{49}\u{7}\u{17}\u{2}\u{2}" .
		    "\u{47}\u{48}\u{7}\u{11}\u{2}\u{2}\u{48}\u{4A}\u{5}\u{2}\u{2}\u{2}" .
		    "\u{49}\u{47}\u{3}\u{2}\u{2}\u{2}\u{49}\u{4A}\u{3}\u{2}\u{2}\u{2}\u{4A}" .
		    "\u{7}\u{3}\u{2}\u{2}\u{2}\u{4B}\u{51}\u{7}\u{4}\u{2}\u{2}\u{4C}\u{4D}" .
		    "\u{5}\u{A}\u{6}\u{2}\u{4D}\u{4E}\u{7}\u{10}\u{2}\u{2}\u{4E}\u{50}" .
		    "\u{3}\u{2}\u{2}\u{2}\u{4F}\u{4C}\u{3}\u{2}\u{2}\u{2}\u{50}\u{53}\u{3}" .
		    "\u{2}\u{2}\u{2}\u{51}\u{4F}\u{3}\u{2}\u{2}\u{2}\u{51}\u{52}\u{3}\u{2}" .
		    "\u{2}\u{2}\u{52}\u{54}\u{3}\u{2}\u{2}\u{2}\u{53}\u{51}\u{3}\u{2}\u{2}" .
		    "\u{2}\u{54}\u{56}\u{5}\u{A}\u{6}\u{2}\u{55}\u{57}\u{7}\u{10}\u{2}" .
		    "\u{2}\u{56}\u{55}\u{3}\u{2}\u{2}\u{2}\u{56}\u{57}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{57}\u{58}\u{3}\u{2}\u{2}\u{2}\u{58}\u{59}\u{7}\u{13}\u{2}\u{2}" .
		    "\u{59}\u{9}\u{3}\u{2}\u{2}\u{2}\u{5A}\u{5C}\u{7}\u{6}\u{2}\u{2}\u{5B}" .
		    "\u{5D}\u{7}\u{18}\u{2}\u{2}\u{5C}\u{5B}\u{3}\u{2}\u{2}\u{2}\u{5C}" .
		    "\u{5D}\u{3}\u{2}\u{2}\u{2}\u{5D}\u{5E}\u{3}\u{2}\u{2}\u{2}\u{5E}\u{60}" .
		    "\u{7}\u{11}\u{2}\u{2}\u{5F}\u{5A}\u{3}\u{2}\u{2}\u{2}\u{5F}\u{60}" .
		    "\u{3}\u{2}\u{2}\u{2}\u{60}\u{61}\u{3}\u{2}\u{2}\u{2}\u{61}\u{62}\u{5}" .
		    "\u{2}\u{2}\u{2}\u{62}\u{B}\u{3}\u{2}\u{2}\u{2}\u{63}\u{65}\u{7}\u{19}" .
		    "\u{2}\u{2}\u{64}\u{66}\u{7}\u{6}\u{2}\u{2}\u{65}\u{64}\u{3}\u{2}\u{2}" .
		    "\u{2}\u{65}\u{66}\u{3}\u{2}\u{2}\u{2}\u{66}\u{67}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{67}\u{6E}\u{7}\u{19}\u{2}\u{2}\u{68}\u{6A}\u{7}\u{1A}\u{2}\u{2}" .
		    "\u{69}\u{6B}\u{7}\u{6}\u{2}\u{2}\u{6A}\u{69}\u{3}\u{2}\u{2}\u{2}\u{6A}" .
		    "\u{6B}\u{3}\u{2}\u{2}\u{2}\u{6B}\u{6C}\u{3}\u{2}\u{2}\u{2}\u{6C}\u{6E}" .
		    "\u{7}\u{1A}\u{2}\u{2}\u{6D}\u{63}\u{3}\u{2}\u{2}\u{2}\u{6D}\u{68}" .
		    "\u{3}\u{2}\u{2}\u{2}\u{6E}\u{D}\u{3}\u{2}\u{2}\u{2}\u{12}\u{18}\u{1E}" .
		    "\u{27}\u{31}\u{34}\u{36}\u{3E}\u{44}\u{49}\u{51}\u{56}\u{5C}\u{5F}" .
		    "\u{65}\u{6A}\u{6D}";

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

			RuntimeMetaData::checkVersion('4.9.2', RuntimeMetaData::VERSION);

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
				$this->setState(28);
				$this->errorHandler->sync($this);

				switch ($this->input->LA(1)) {
				    case self::OpenParen:
				    	$localContext = new Context\ParenExprContext($localContext);
				    	$this->ctx = $localContext;
				    	$previousContext = $localContext;

				    	$this->setState(13);
				    	$this->match(self::OpenParen);
				    	$this->setState(14);
				    	$this->recursiveTypeExpr(0);
				    	$this->setState(15);
				    	$this->match(self::CloseParen);
				    	break;

				    case self::Identifier:
				    	$localContext = new Context\SimpleExprContext($localContext);
				    	$this->ctx = $localContext;
				    	$previousContext = $localContext;
				    	$this->setState(17);
				    	$this->match(self::Identifier);
				    	$this->setState(22);
				    	$this->errorHandler->sync($this);

				    	switch ($this->getInterpreter()->adaptivePredict($this->input, 0, $this->ctx)) {
				    	    case 1:
				    		    $this->setState(18);
				    		    $this->match(self::LT);
				    		    $this->setState(19);
				    		    $this->typeList();
				    		    $this->setState(20);
				    		    $this->match(self::GT);
				    		break;
				    	}
				    	break;

				    case self::T__0:
				    	$localContext = new Context\CallableExprContext($localContext);
				    	$this->ctx = $localContext;
				    	$previousContext = $localContext;
				    	$this->setState(24);
				    	$this->callableType();
				    	break;

				    case self::T__1:
				    	$localContext = new Context\CurlyArrayExprContext($localContext);
				    	$this->ctx = $localContext;
				    	$previousContext = $localContext;
				    	$this->setState(25);
				    	$this->curlyArray();
				    	break;

				    case self::SingleQuote:
				    case self::DoubleQuote:
				    	$localContext = new Context\StringLiteralExprContext($localContext);
				    	$this->ctx = $localContext;
				    	$previousContext = $localContext;
				    	$this->setState(26);
				    	$this->stringLiteral();
				    	break;

				    case self::IntLiteral:
				    	$localContext = new Context\IntLiteralExprContext($localContext);
				    	$this->ctx = $localContext;
				    	$previousContext = $localContext;
				    	$this->setState(27);
				    	$this->match(self::IntLiteral);
				    	break;

				default:
					throw new NoViableAltException($this);
				}
				$this->ctx->stop = $this->input->LT(-1);
				$this->setState(52);
				$this->errorHandler->sync($this);

				$alt = $this->getInterpreter()->adaptivePredict($this->input, 5, $this->ctx);

				while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
					if ($alt === 1) {
						if ($this->getParseListeners() !== null) {
						    $this->triggerExitRuleEvent();
						}

						$previousContext = $localContext;
						$this->setState(50);
						$this->errorHandler->sync($this);

						switch ($this->getInterpreter()->adaptivePredict($this->input, 4, $this->ctx)) {
							case 1:
							    $localContext = new Context\UnionContext(new Context\TypeExprContext($parentContext, $parentState));
							    $this->pushNewRecursionContext($localContext, $startState, self::RULE_typeExpr);
							    $this->setState(30);

							    if (!($this->precpred($this->ctx, 2))) {
							        throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 2)");
							    }
							    $this->setState(31);
							    $this->match(self::Pipe);
							    $this->setState(32);
							    $this->recursiveTypeExpr(0);
							    $this->setState(37);
							    $this->errorHandler->sync($this);

							    $alt = $this->getInterpreter()->adaptivePredict($this->input, 2, $this->ctx);

							    while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
							    	if ($alt === 1) {
							    		$this->setState(33);
							    		$this->match(self::Pipe);
							    		$this->setState(34);
							    		$this->recursiveTypeExpr(0); 
							    	}

							    	$this->setState(39);
							    	$this->errorHandler->sync($this);

							    	$alt = $this->getInterpreter()->adaptivePredict($this->input, 2, $this->ctx);
							    }
							break;

							case 2:
							    $localContext = new Context\IntersectionContext(new Context\TypeExprContext($parentContext, $parentState));
							    $this->pushNewRecursionContext($localContext, $startState, self::RULE_typeExpr);
							    $this->setState(40);

							    if (!($this->precpred($this->ctx, 1))) {
							        throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 1)");
							    }
							    $this->setState(41);
							    $this->match(self::Amp);
							    $this->setState(42);
							    $this->recursiveTypeExpr(0);
							    $this->setState(47);
							    $this->errorHandler->sync($this);

							    $alt = $this->getInterpreter()->adaptivePredict($this->input, 3, $this->ctx);

							    while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
							    	if ($alt === 1) {
							    		$this->setState(43);
							    		$this->match(self::Amp);
							    		$this->setState(44);
							    		$this->recursiveTypeExpr(0); 
							    	}

							    	$this->setState(49);
							    	$this->errorHandler->sync($this);

							    	$alt = $this->getInterpreter()->adaptivePredict($this->input, 3, $this->ctx);
							    }
							break;
						} 
					}

					$this->setState(54);
					$this->errorHandler->sync($this);

					$alt = $this->getInterpreter()->adaptivePredict($this->input, 5, $this->ctx);
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
		public function typeList() : Context\TypeListContext
		{
		    $localContext = new Context\TypeListContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 2, self::RULE_typeList);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(55);
		        $this->recursiveTypeExpr(0);
		        $this->setState(60);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::Comma) {
		        	$this->setState(56);
		        	$this->match(self::Comma);
		        	$this->setState(57);
		        	$this->recursiveTypeExpr(0);
		        	$this->setState(62);
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
		public function callableType() : Context\CallableTypeContext
		{
		    $localContext = new Context\CallableTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 4, self::RULE_callableType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(63);
		        $this->match(self::T__0);
		        $this->setState(64);
		        $this->match(self::OpenParen);
		        $this->setState(66);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & ((1 << self::T__0) | (1 << self::T__1) | (1 << self::IntLiteral) | (1 << self::Identifier) | (1 << self::OpenParen) | (1 << self::SingleQuote) | (1 << self::DoubleQuote))) !== 0)) {
		        	$this->setState(65);
		        	$this->typeList();
		        }
		        $this->setState(68);
		        $this->match(self::CloseParen);
		        $this->setState(71);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 8, $this->ctx)) {
		            case 1:
		        	    $this->setState(69);
		        	    $this->match(self::Colon);
		        	    $this->setState(70);
		        	    $this->recursiveTypeExpr(0);
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
		public function curlyArray() : Context\CurlyArrayContext
		{
		    $localContext = new Context\CurlyArrayContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 6, self::RULE_curlyArray);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(73);
		        $this->match(self::T__1);
		        $this->setState(79);
		        $this->errorHandler->sync($this);

		        $alt = $this->getInterpreter()->adaptivePredict($this->input, 9, $this->ctx);

		        while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
		        	if ($alt === 1) {
		        		$this->setState(74);
		        		$this->curlyArrayEntry();
		        		$this->setState(75);
		        		$this->match(self::Comma); 
		        	}

		        	$this->setState(81);
		        	$this->errorHandler->sync($this);

		        	$alt = $this->getInterpreter()->adaptivePredict($this->input, 9, $this->ctx);
		        }

		        $this->setState(82);
		        $this->curlyArrayEntry();
		        $this->setState(84);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::Comma) {
		        	$this->setState(83);
		        	$this->match(self::Comma);
		        }
		        $this->setState(86);
		        $this->match(self::CurlyClose);
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

		    $this->enterRule($localContext, 8, self::RULE_curlyArrayEntry);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(93);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 12, $this->ctx)) {
		            case 1:
		        	    $this->setState(88);
		        	    $this->match(self::Identifier);
		        	    $this->setState(90);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::QuestionMark) {
		        	    	$this->setState(89);
		        	    	$localContext->optional = $this->match(self::QuestionMark);
		        	    }
		        	    $this->setState(92);
		        	    $this->match(self::Colon);
		        	break;
		        }
		        $this->setState(95);
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

		    $this->enterRule($localContext, 10, self::RULE_stringLiteral);

		    try {
		        $this->setState(107);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::SingleQuote:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(97);
		            	$this->match(self::SingleQuote);
		            	$this->setState(99);
		            	$this->errorHandler->sync($this);
		            	$_la = $this->input->LA(1);

		            	if ($_la === self::Identifier) {
		            		$this->setState(98);
		            		$this->match(self::Identifier);
		            	}
		            	$this->setState(101);
		            	$this->match(self::SingleQuote);
		            	break;

		            case self::DoubleQuote:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(102);
		            	$this->match(self::DoubleQuote);
		            	$this->setState(104);
		            	$this->errorHandler->sync($this);
		            	$_la = $this->input->LA(1);

		            	if ($_la === self::Identifier) {
		            		$this->setState(103);
		            		$this->match(self::Identifier);
		            	}
		            	$this->setState(106);
		            	$this->match(self::DoubleQuote);
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

	    public function LT() : ?TerminalNode
	    {
	        return $this->getToken(PhpTypesParser::LT, 0);
	    }

	    public function typeList() : ?TypeListContext
	    {
	    	return $this->getTypedRuleContext(TypeListContext::class, 0);
	    }

	    public function GT() : ?TerminalNode
	    {
	        return $this->getToken(PhpTypesParser::GT, 0);
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

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function Amp(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(PhpTypesParser::Amp);
	    	}

	        return $this->getToken(PhpTypesParser::Amp, $index);
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

	class ParenExprContext extends TypeExprContext
	{
		public function __construct(TypeExprContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function OpenParen() : ?TerminalNode
	    {
	        return $this->getToken(PhpTypesParser::OpenParen, 0);
	    }

	    public function typeExpr() : ?TypeExprContext
	    {
	    	return $this->getTypedRuleContext(TypeExprContext::class, 0);
	    }

	    public function CloseParen() : ?TerminalNode
	    {
	        return $this->getToken(PhpTypesParser::CloseParen, 0);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof PhpTypesListener) {
			    $listener->enterParenExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof PhpTypesListener) {
			    $listener->exitParenExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof PhpTypesVisitor) {
			    return $visitor->visitParenExpr($this);
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

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function Pipe(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(PhpTypesParser::Pipe);
	    	}

	        return $this->getToken(PhpTypesParser::Pipe, $index);
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

	class TypeListContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return PhpTypesParser::RULE_typeList;
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

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function Comma(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(PhpTypesParser::Comma);
	    	}

	        return $this->getToken(PhpTypesParser::Comma, $index);
	    }

		public function enterRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof PhpTypesListener) {
			    $listener->enterTypeList($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener) : void
		{
			if ($listener instanceof PhpTypesListener) {
			    $listener->exitTypeList($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof PhpTypesVisitor) {
			    return $visitor->visitTypeList($this);
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

	    public function OpenParen() : ?TerminalNode
	    {
	        return $this->getToken(PhpTypesParser::OpenParen, 0);
	    }

	    public function CloseParen() : ?TerminalNode
	    {
	        return $this->getToken(PhpTypesParser::CloseParen, 0);
	    }

	    public function typeList() : ?TypeListContext
	    {
	    	return $this->getTypedRuleContext(TypeListContext::class, 0);
	    }

	    public function Colon() : ?TerminalNode
	    {
	        return $this->getToken(PhpTypesParser::Colon, 0);
	    }

	    public function typeExpr() : ?TypeExprContext
	    {
	    	return $this->getTypedRuleContext(TypeExprContext::class, 0);
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

	    public function CurlyClose() : ?TerminalNode
	    {
	        return $this->getToken(PhpTypesParser::CurlyClose, 0);
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

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function Comma(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(PhpTypesParser::Comma);
	    	}

	        return $this->getToken(PhpTypesParser::Comma, $index);
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

	    public function Colon() : ?TerminalNode
	    {
	        return $this->getToken(PhpTypesParser::Colon, 0);
	    }

	    public function QuestionMark() : ?TerminalNode
	    {
	        return $this->getToken(PhpTypesParser::QuestionMark, 0);
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

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function SingleQuote(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(PhpTypesParser::SingleQuote);
	    	}

	        return $this->getToken(PhpTypesParser::SingleQuote, $index);
	    }

	    public function Identifier() : ?TerminalNode
	    {
	        return $this->getToken(PhpTypesParser::Identifier, 0);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function DoubleQuote(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(PhpTypesParser::DoubleQuote);
	    	}

	        return $this->getToken(PhpTypesParser::DoubleQuote, $index);
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