<?php

/*
 * Generated from C:/Users/rgott/Projects/php-types\PhpTypes.g4 by ANTLR 4.9.2
 */

namespace PhpTypesParser;
use Antlr\Antlr4\Runtime\Tree\ParseTreeListener;

/**
 * This interface defines a complete listener for a parse tree produced by
 * {@see PhpTypesParser}.
 */
interface PhpTypesListener extends ParseTreeListener {
	/**
	 * Enter a parse tree produced by the `SimpleExpr`
	 * labeled alternative in {@see PhpTypesParser::typeExpr()}.
	 * @param $context The parse tree.
	 */
	public function enterSimpleExpr(Context\SimpleExprContext $context) : void;
	/**
	 * Exit a parse tree produced by the `SimpleExpr` labeled alternative
	 * in {@see PhpTypesParser::typeExpr()}.
	 * @param $context The parse tree.
	 */
	public function exitSimpleExpr(Context\SimpleExprContext $context) : void;
	/**
	 * Enter a parse tree produced by the `Intersection`
	 * labeled alternative in {@see PhpTypesParser::typeExpr()}.
	 * @param $context The parse tree.
	 */
	public function enterIntersection(Context\IntersectionContext $context) : void;
	/**
	 * Exit a parse tree produced by the `Intersection` labeled alternative
	 * in {@see PhpTypesParser::typeExpr()}.
	 * @param $context The parse tree.
	 */
	public function exitIntersection(Context\IntersectionContext $context) : void;
	/**
	 * Enter a parse tree produced by the `IntLiteralExpr`
	 * labeled alternative in {@see PhpTypesParser::typeExpr()}.
	 * @param $context The parse tree.
	 */
	public function enterIntLiteralExpr(Context\IntLiteralExprContext $context) : void;
	/**
	 * Exit a parse tree produced by the `IntLiteralExpr` labeled alternative
	 * in {@see PhpTypesParser::typeExpr()}.
	 * @param $context The parse tree.
	 */
	public function exitIntLiteralExpr(Context\IntLiteralExprContext $context) : void;
	/**
	 * Enter a parse tree produced by the `StringLiteralExpr`
	 * labeled alternative in {@see PhpTypesParser::typeExpr()}.
	 * @param $context The parse tree.
	 */
	public function enterStringLiteralExpr(Context\StringLiteralExprContext $context) : void;
	/**
	 * Exit a parse tree produced by the `StringLiteralExpr` labeled alternative
	 * in {@see PhpTypesParser::typeExpr()}.
	 * @param $context The parse tree.
	 */
	public function exitStringLiteralExpr(Context\StringLiteralExprContext $context) : void;
	/**
	 * Enter a parse tree produced by the `CurlyArrayExpr`
	 * labeled alternative in {@see PhpTypesParser::typeExpr()}.
	 * @param $context The parse tree.
	 */
	public function enterCurlyArrayExpr(Context\CurlyArrayExprContext $context) : void;
	/**
	 * Exit a parse tree produced by the `CurlyArrayExpr` labeled alternative
	 * in {@see PhpTypesParser::typeExpr()}.
	 * @param $context The parse tree.
	 */
	public function exitCurlyArrayExpr(Context\CurlyArrayExprContext $context) : void;
	/**
	 * Enter a parse tree produced by the `CallableExpr`
	 * labeled alternative in {@see PhpTypesParser::typeExpr()}.
	 * @param $context The parse tree.
	 */
	public function enterCallableExpr(Context\CallableExprContext $context) : void;
	/**
	 * Exit a parse tree produced by the `CallableExpr` labeled alternative
	 * in {@see PhpTypesParser::typeExpr()}.
	 * @param $context The parse tree.
	 */
	public function exitCallableExpr(Context\CallableExprContext $context) : void;
	/**
	 * Enter a parse tree produced by the `Union`
	 * labeled alternative in {@see PhpTypesParser::typeExpr()}.
	 * @param $context The parse tree.
	 */
	public function enterUnion(Context\UnionContext $context) : void;
	/**
	 * Exit a parse tree produced by the `Union` labeled alternative
	 * in {@see PhpTypesParser::typeExpr()}.
	 * @param $context The parse tree.
	 */
	public function exitUnion(Context\UnionContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see PhpTypesParser::typeList()}.
	 * @param $context The parse tree.
	 */
	public function enterTypeList(Context\TypeListContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see PhpTypesParser::typeList()}.
	 * @param $context The parse tree.
	 */
	public function exitTypeList(Context\TypeListContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see PhpTypesParser::callableType()}.
	 * @param $context The parse tree.
	 */
	public function enterCallableType(Context\CallableTypeContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see PhpTypesParser::callableType()}.
	 * @param $context The parse tree.
	 */
	public function exitCallableType(Context\CallableTypeContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see PhpTypesParser::curlyArray()}.
	 * @param $context The parse tree.
	 */
	public function enterCurlyArray(Context\CurlyArrayContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see PhpTypesParser::curlyArray()}.
	 * @param $context The parse tree.
	 */
	public function exitCurlyArray(Context\CurlyArrayContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see PhpTypesParser::curlyArrayEntry()}.
	 * @param $context The parse tree.
	 */
	public function enterCurlyArrayEntry(Context\CurlyArrayEntryContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see PhpTypesParser::curlyArrayEntry()}.
	 * @param $context The parse tree.
	 */
	public function exitCurlyArrayEntry(Context\CurlyArrayEntryContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see PhpTypesParser::stringLiteral()}.
	 * @param $context The parse tree.
	 */
	public function enterStringLiteral(Context\StringLiteralContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see PhpTypesParser::stringLiteral()}.
	 * @param $context The parse tree.
	 */
	public function exitStringLiteral(Context\StringLiteralContext $context) : void;
}