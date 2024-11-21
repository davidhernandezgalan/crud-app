<x-mail::message>

{{-- Encabezado --}}
<div style="text-align: center; margin-top: 28px;">
<span style="color: #004aad; font-weight: bold;">Se añadió un nuevo servicio</span>
</div>

## <span style="color: #e4ac00;">{{ $servicio->titulo }}</span>

{{-- Panel con cuerpo del mensaje --}}
<x-mail::panel>
        {{ $servicio->cuerpo }}
        # <span style="color: #000000;">"¡Novedades en nuestra barbería! 💈  
Hemos añadido un nuevo servicio exclusivo para nuestros clientes, y queremos que formes parte de esta experiencia única.  

Es tu oportunidad de aprenderlo y ofrecerlo en tu silla. ¡Destaca con nosotros y lleva tu talento al siguiente nivel! 🚀</span>
   
</x-mail::panel>

{{-- Botón de acción --}}
<x-mail::button :url="route('servicio.show', $servicio)" style="background-color: #ff3131; border-color: #ff3131; color: #ffffff;">
    Ver Servicio
</x-mail::button>

{{-- Nota al final --}}
<div style="text-align: center; margin-top: 20px;">
    <span style="font-size: 14px; color: #004aad;">
        No olvides ofrecer este nuevo servicio a los clientes.
    </span>
</div>

</x-mail::message>

