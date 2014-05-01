<?php namespace Samsui;

class Definition implements DefinitionInterface
{
    /**
     * Build sequence number
     * @var int
     * @since 1.0.0
     */
    protected $sequence = 0;

    /**
     * An array of sequencing attributes
     * @var array
     * @since 1.0.0
     */
    protected $sequences = array();

    /**
     * An array of value attributes
     * Closures may be added to this array that will be resolved later.
     * @var array
     * @since 1.0.0
     */
    protected $values = array();

    /**
     * An array of closures that will act like the object's methods.
     * @var array
     * @since 1.0.0
     */
    protected $methods = array();

    /**
     * Define a sequencing attribute to the object definition
     * @param string $name The name of the attribute
     * @return Samsui\Definition Returns the Definition for method chaining
     * @since 1.0.0
     */
    public function sequence($name)
    {
        $this->sequences[] = $name;
        return $this;
    }

    /**
     * Define an attribute to the object definition
     * @param string $name The name of the attribute
     * @param mixed|callable $value The value set to the attribute. If the attribute set is callable, at build-time the value returned from the callable will be inserted.
     * @return Samsui\Definition Returns the Definition for method chaining
     * @since 1.0.0
     */
    public function attr($name, $value)
    {
        if (!isset($this->values[$name])) {
            $this->values[$name] = $value;
        }
        return $this;
    }

    /**
     * Define a function to the object definition to act as an object method
     * @param string $name The name of the method
     * @param callable $closure The function or closure to be assigned.
     * @return Samsui\Definition Returns the Definition for method chaining
     * @since 1.0.0
     */
    public function method($name, $closure)
    {
        if (is_callable($closure) && !isset($this->methods[$name])) {
            $this->methods[$name] = $closure;
        }
        return $this;
    }

    /**
     * Build the definition into a representative object
     * @return Samsui\Wrapper Returns the wrapper object encapsulating the compiled properties and methods.
     * @since 1.0.0
     */
    public function build()
    {
        ++$this->sequence;
        $properties = array();

        foreach ($this->sequences as $name) {
            $properties[$name] = $this->sequence;
        }

        foreach ($this->values as $name => &$value) {
            $properties[$name] = $value;
        }

        return new Wrapper($properties, $this->methods, $this->sequence);
    }
}
