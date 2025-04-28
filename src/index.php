<?php

use PHPUnit\Event\Code\Throwable;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Component\DependencyInjection\Container;


// dd($response);

$container = new Container();

class MyNotFoundException extends Exception implements NotFoundExceptionInterface
{

    /**
     * Gets the message
     * @link https://php.net/manual/en/throwable.getmessage.php
     * @return string
     * @since 7.0
     */
    // public function getMessage(): string {
    //     return 'exception message'; 
    // }

    /**
     * Gets the exception code
     * @link https://php.net/manual/en/throwable.getcode.php
     * @return int <p>
     * Returns the exception code as integer in
     * {@see Exception} but possibly as other type in
     * {@see Exception} descendants (for example as
     * string in {@see PDOException}).
     * </p>
     * @since 7.0
     */
    // public function getCode(){
    //     return 'exception code'; 
    // }

    /**
     * Gets the file in which the exception occurred
     * @link https://php.net/manual/en/throwable.getfile.php
     * @return string Returns the name of the file from which the object was thrown.
     * @since 7.0
     */
    // public function getFile(): string{
    //     return 'exception file'; 
    // }

    /**
     * Gets the line on which the object was instantiated
     * @link https://php.net/manual/en/throwable.getline.php
     * @return int Returns the line number where the thrown object was instantiated.
     * @since 7.0
     */
    // public function getLine(): int{
    //     return 255; 
    // }

    /**
     * Gets the stack trace
     * @link https://php.net/manual/en/throwable.gettrace.php
     * @return array <p>
     * Returns the stack trace as an array in the same format as
     * {@see debug_backtrace()}.
     * </p>
     * @since 7.0
     */
    // public function getTrace(): array{
    //     return ['trace array 1', 'trace array 2']; 
    // }

    /**
     * Gets the stack trace as a string
     * @link https://php.net/manual/en/throwable.gettraceasstring.php
     * @return string Returns the stack trace as a string.
     * @since 7.0
     */
    // public function getTraceAsString(): string{
    //     return 'exception Trace as string'; 
    // }

    /**
     * Returns the previous Throwable
     * @link https://php.net/manual/en/throwable.getprevious.php
     * @return null|Throwable Returns the previous {@see Throwable} if available, or <b>NULL</b> otherwise.
     * @since 7.0
     */
    // #[LanguageLevelTypeAware(['8.0' => 'Throwable|null'], default: '')]
    // public function getPrevious():NULL{
    //     return NULL; 
    // }

    /**
     * Gets a string representation of the thrown object
     * @link https://php.net/manual/en/throwable.tostring.php
     * @return string <p>Returns the string representation of the thrown object.</p>
     * @since 7.0
     */
    public function __toString()
    {
        return 'exception toString';
    }
}



class MyContainer implements ContainerInterface
{

    private array $services;
    public function get($id)
    {

        if (!isset($this->services[$id])) {
            throw new MyNotFoundException('Service not found:', $id);
        }

        return $this->services[$id];
    }

    /**
     * Returns true if the container can return an entry for the given identifier.
     * Returns false otherwise.
     *
     * `has($id)` returning true does not mean that `get($id)` will not throw an exception.
     * It does however mean that `get($id)` will not throw a `NotFoundExceptionInterface`.
     *
     * @param string $id Identifier of the entry to look for.
     *
     * @return bool
     */
    public function has(string $id): bool
    {

        return isset($this->services[$id]);
    }
}

class MyService {}




$container->set('MyService', new MyService());

$myService = $container->get('MyService');


dump($myService); 
dump($container);




echo "here";
exit;
