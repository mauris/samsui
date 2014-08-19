<?php namespace Samsui;

interface DefinitionInterface
{
    /**
     * Define a sequencing attribute to the object definition
     * @param string $name The name of the attribute
     * @return \Samsui\Definition Returns the Definition for method chaining
     * @since 1.0.0
     */
    public function sequence($name);

    /**
     * Define an attribute to the object definition
     * @param string $name The name of the attribute
     * @param mixed|callable The value set to the attribute. If the attribute set is callable, at build-time the value returned from the callable will be inserted.
     * @return Definition Returns the Definition for method chaining
     * @since 1.0.0
     */
    public function attr($name, $value);

    /**
     * Define a function to the object definition to act as an object method
     * @param string $name The name of the method
     * @param callable $closure The function or closure to be assigned.
     * @return \Samsui\Definition Returns the Definition for method chaining
     * @since 1.0.0
     */
    public function method($name, $closure);

    /**
     * Build the definition into a representative object
     * @return \Samsui\Wrapper Returns the object with the compiled properties and methods.
     * @since 1.0.0
     */
    public function build();
}
