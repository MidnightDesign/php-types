<?php

/*
 * Generated from C:/Users/rgott/Projects/php-types\PhpTypes.g4 by ANTLR 4.9.2
 */

namespace PhpTypesParser;

use Antlr\Antlr4\Runtime\Tree\ParseTreeVisitor;

/**
 * This interface defines a complete generic visitor for a parse tree produced by {@see PhpTypesParser}.
 */
interface PhpTypesVisitor extends ParseTreeVisitor
{
	/**
	 * Visit a parse tree produced by the `SimpleExpr` labeled alternative
	 * in {@see PhpTypesParser::typeExpr()}.
	 *
	 * @param Context\SimpleExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitSimpleExpr(Context\SimpleExprContext $context);

	/**
	 * Visit a parse tree produced by the `Intersection` labeled alternative
	 * in {@see PhpTypesParser::typeExpr()}.
	 *
	 * @param Context\IntersectionContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitIntersection(Context\IntersectionContext $context);

	/**
	 * Visit a parse tree produced by the `IntLiteralExpr` labeled alternative
	 * in {@see PhpTypesParser::typeExpr()}.
	 *
	 * @param Context\IntLiteralExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitIntLiteralExpr(Context\IntLiteralExprContext $context);

	/**
	 * Visit a parse tree produced by the `StringLiteralExpr` labeled alternative
	 * in {@see PhpTypesParser::typeExpr()}.
	 *
	 * @param Context\StringLiteralExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitStringLiteralExpr(Context\StringLiteralExprContext $context);

	/**
	 * Visit a parse tree produced by the `CurlyArrayExpr` labeled alternative
	 * in {@see PhpTypesParser::typeExpr()}.
	 *
	 * @param Context\CurlyArrayExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitCurlyArrayExpr(Context\CurlyArrayExprContext $context);

	/**
	 * Visit a parse tree produced by the `CallableExpr` labeled alternative
	 * in {@see PhpTypesParser::typeExpr()}.
	 *
	 * @param Context\CallableExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitCallableExpr(Context\CallableExprContext $context);

	/**
	 * Visit a parse tree produced by the `Union` labeled alternative
	 * in {@see PhpTypesParser::typeExpr()}.
	 *
	 * @param Context\UnionContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitUnion(Context\UnionContext $context);

	/**
	 * Visit a parse tree produced by {@see PhpTypesParser::typeList()}.
	 *
	 * @param Context\TypeListContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitTypeList(Context\TypeListContext $context);

	/**
	 * Visit a parse tree produced by {@see PhpTypesParser::callableType()}.
	 *
	 * @param Context\CallableTypeContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitCallableType(Context\CallableTypeContext $context);

	/**
	 * Visit a parse tree produced by {@see PhpTypesParser::argumentList()}.
	 *
	 * @param Context\ArgumentListContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitArgumentList(Context\ArgumentListContext $context);

	/**
	 * Visit a parse tree produced by {@see PhpTypesParser::returnType()}.
	 *
	 * @param Context\ReturnTypeContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitReturnType(Context\ReturnTypeContext $context);

	/**
	 * Visit a parse tree produced by {@see PhpTypesParser::curlyArray()}.
	 *
	 * @param Context\CurlyArrayContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitCurlyArray(Context\CurlyArrayContext $context);

	/**
	 * Visit a parse tree produced by {@see PhpTypesParser::curlyArrayEntry()}.
	 *
	 * @param Context\CurlyArrayEntryContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitCurlyArrayEntry(Context\CurlyArrayEntryContext $context);

	/**
	 * Visit a parse tree produced by {@see PhpTypesParser::stringLiteral()}.
	 *
	 * @param Context\StringLiteralContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitStringLiteral(Context\StringLiteralContext $context);
}