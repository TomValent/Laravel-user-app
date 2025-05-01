<?php

namespace App\Sniffs;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;

class PascalCaseClassNameSniff implements Sniff
{
    /**
     * Registers the sniff for class declarations.
     *
     * @return int[]
     */
    public function register(): array
    {
        return [T_CLASS];
    }

    /**
     * Processes the tokens to check for PascalCase class names.
     *
     * @param File $phpcsFile The current file being checked
     * @param int $stackPtr The position of the current token in the stack
     *
     * @return void
     */
    public function process(File $phpcsFile, $stackPtr): void
    {
        $tokens         = $phpcsFile->getTokens();
        $classNameToken = $tokens[$stackPtr + 2];

        if (isset($classNameToken['content']) && !preg_match('/^[A-Z][a-zA-Z0-9]*$/', $classNameToken['content'])) {
            $error = 'Class name "%s" is not in PascalCase';
            $data  = [$classNameToken['content']];
            $phpcsFile->addError($error, $stackPtr, 'NotPascalCase', $data);
        }
    }
}
