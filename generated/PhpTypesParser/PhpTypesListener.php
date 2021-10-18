<?php

/*
 * Generated from C:/Users/rgott/Projects/antlr.php-types-parser-for-php\PhpTypes.g4 by ANTLR 4.9.1
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
	 * Enter a parse tree produced by the `GenericExpr`
	 * labeled alternative in {@see PhpTypesParser::typeExpr()}.
	 * @param $context The parse tree.
	 */
	public function enterGenericExpr(Context\GenericExprContext $context) : void;
	/**
	 * Exit a parse tree produced by the `GenericExpr` labeled alternative
	 * in {@see PhpTypesParser::typeExpr()}.
	 * @param $context The parse tree.
	 */
	public function exitGenericExpr(Context\GenericExprContext $context) : void;
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
	 * Enter a parse tree produced by {@see PhpTypesParser::generic()}.
	 * @param $context The parse tree.
	 */
	public function enterGeneric(Context\GenericContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see PhpTypesParser::generic()}.
	 * @param $context The parse tree.
	 */
	public function exitGeneric(Context\GenericContext $context) : void;
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
	 * Enter a parse tree produced by {@see PhpTypesParser::argumentList()}.
	 * @param $context The parse tree.
	 */
	public function enterArgumentList(Context\ArgumentListContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see PhpTypesParser::argumentList()}.
	 * @param $context The parse tree.
	 */
	public function exitArgumentList(Context\ArgumentListContext $context) : void;
	/**
	 * Enter a parse tree produced by {@see PhpTypesParser::returnType()}.
	 * @param $context The parse tree.
	 */
	public function enterReturnType(Context\ReturnTypeContext $context) : void;
	/**
	 * Exit a parse tree produced by {@see PhpTypesParser::returnType()}.
	 * @param $context The parse tree.
	 */
	public function exitReturnType(Context\ReturnTypeContext $context) : void;
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
}