--TEST--
Test throw
--SKIPIF--
<?php require_once('skipif.inc'); ?>
--FILE--
<?php
uopz_overload(ZEND_THROW, function(&$exception){
	if (!$exception instanceof RuntimeException) {
		$exception = new RuntimeException(
			"additional", ZEND_THROW, $exception);
	}
});

throw new Exception("basic");
?>
--EXPECTF--
Fatal error: Uncaught exception 'Exception' with message 'basic' in %s:%d
Stack trace:
#0 {main}

Next exception 'RuntimeException' with message 'additional' in %s:%d
Stack trace:
#0 %s(%d): {closure}(Object(RuntimeException), NULL)
#1 {main}
  thrown in %s on line %d


