<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactForm extends Component
{
    public $name = '';

    public $email = '';

    public $phone = '';

    public $comments = '';

    public $successMessage = '';

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'comments' => 'required|string|max:1000',
    ];

    protected $messages = [
        'name.required' => 'El nombre es obligatorio.',
        'email.required' => 'El correo electrónico es obligatorio.',
        'email.email' => 'El correo electrónico debe ser válido.',
        'phone.required' => 'El teléfono es obligatorio.',
        'comments.required' => 'Los comentarios son obligatorios.',
    ];

    public function submit()
    {
        $this->validate();

        Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'comments' => $this->comments,
            'is_read' => false,
        ]);

        $this->successMessage = '¡Gracias por contactarnos! Te responderemos pronto.';

        $this->reset(['name', 'email', 'phone', 'comments']);
    }

    public function render()
    {

        return view('livewire.contact-form')->layout('layouts.principal');
    }
}
