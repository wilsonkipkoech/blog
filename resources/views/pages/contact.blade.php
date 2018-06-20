
@extends('main')   
@section ('title', '|CONTACT')    

  @section('content')
             <div class="row">
                 <div class="col-md-12">
                    <h1> CONTACT ME</h1>
                     <form>
                         <div class="form-group">
                             <label name="email">EMAIL:</label>
                             <input id="email" name="email" class="form-control">
                         </div>

                         <div class="form-group">
                             <label name="message">MESSAGE:</label>
                             <input id="message" name="message" class="form-control">
                         </div>

                            <div class="form-group">
                             <label name="message">MESSAGE:</label>
                             <textarea id="message" name="message" class="form-control">Type your message here...</textarea> 
                         </div>

                         <input type="submit" value="Send Message" class="btn btn-success">


                     </form>
                    
                 </div> 
             </div>
       @endsection