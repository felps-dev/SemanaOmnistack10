import React, {useState, useEffect} from 'react'

function DevForm({onSubmit}) {

    const [github_username, setgithub_username] = useState('');
    const [techs, settechs] = useState('');
    const [latitude, setLatitude] = useState('');
    const [longitude, setLongitude] = useState('');
    
    useEffect(() => {
        navigator.geolocation.getCurrentPosition(
          (position) => {
            const {latitude, longitude} = position.coords;
            setLatitude(latitude);
            setLongitude(longitude);
          },
          (err) => {
            console.log(err);
          },
          {timeout: 30000}
        );
      }, [])

    async function handleSubmit(e) {
        e.preventDefault();
        await onSubmit({
            github_username,
            techs,
            latitude,
            longitude
          });
        setgithub_username('');
        settechs('');  
    }

    return (
        <form onSubmit={handleSubmit}>               
            <div className="input-block">
            <label htmlFor="github_username">Usuário do Github</label>
            <input name="github_username" id="username_github" value={github_username} required onChange={e => setgithub_username(e.target.value)}/>
            </div>
            
            <div className="input-block">
            <label htmlFor="techs">Tecnologias</label>
            <input name="techs" id="techs" required value={techs} onChange={e => settechs(e.target.value)}/>
            </div>


            <div className="input-group">
            <div className="input-block">
                <label htmlFor="">latidude</label>
                <input 
                type="number" 
                value={latitude} 
                name="latidude" 
                id="latidude" 
                onChange={e => setLatitude(e.target.value)}
                required/>
            </div>
            <div className="input-block">
                <label htmlFor="">longitude</label>
                <input 
                type="number" 
                value={longitude} 
                name="longitude" 
                id="longitude" 
                onChange={e => setLongitude(e.target.value)}
                required/>
            </div>
            </div>

            <button type="submit">Salvar</button>
        </form>
    )
}

export default DevForm
