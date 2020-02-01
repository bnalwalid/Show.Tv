<template>
    <div class="container">
        <h2>Admin Panel</h2>
        <ul class="nav nav-tabs">
            <li class="nav-item">
            <button v-on:click="isHidden = false, isHidden2 = false, isHidden3 = true" class="nav-link" v-bind:class="[isHidden3 ? 'active' : '', '']">Add/View/Edit/ Series</button>
            </li>
            <li class="nav-item">
                <button v-on:click="isHidden = true, isHidden2 = false, isHidden3 = false" class="nav-link" v-bind:class="[isHidden ? 'active' : '', '']">Add/View/Edit/ Episodes</button>
            </li>
            <li class="nav-item">
                <button v-on:click="isHidden = false, isHidden2 = true, isHidden3 = false" class="nav-link" v-bind:class="[isHidden2 ? 'active' : '', '']">view users</button>
            </li>
        </ul>
        <div v-if="isHidden" class="row container mt-4 justify-content-md-center">
        <form @submit.prevent="addEpisode">
            <div class="form-row">
                <div class="form-group col-md-12">
                <label for="title">Title</label>
                <input type="title" class="form-control" v-model="episode.title" id="title">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">description</label>
                <textarea name="description" id="description" v-model="episode.description" class="form-control" cols="10" rows="3"></textarea>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="duration">duration</label>
                <input type="text" class="form-control"  v-model="episode.duration" id="duration">
                </div>
                <div class="form-group col-md-6">
                <label for="airing_time">airing time</label>
                <input type="text" class="form-control" v-model="episode.airing_time" id="airing_time">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Insert</button>
            </form>
        <div class="card card-body mb-3" v-for="episode in episodes" v-bind:key="episode.id">
        <h4><h2>{{episode.id}}</h2>{{ episode.title }}</h4>
        <p>{{ episode.description }} - <b class="text-danger"> from Series: {{series[(episode.id-1)].title}} </b></p>
        <button type="button" class="btn btn-danger" @click="deleteEpisode(episode.id)">Delete</button>
        </div>
        </div>
        <div v-if="isHidden2" class="row container mt-4 justify-content-md-center">
        <table class="table table-sm">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Rule</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="user in users" v-bind:key="user.id">
            <th scope="row">{{user.id}}</th>
            <td>{{user.name}}</td>
            <td>{{user.email}}</td>
            <td>{{user.rule === 1 ? 'Manger': 'User'}}</td>
            </tr>
        </tbody>
        </table>
        </div>

        <div v-if="isHidden3" class="row container mt-4 justify-content-md-center">
        <table class="table table-sm">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">description</th>
            <th scope="col">showtime</th>
            <th scope="col">imgSeries</th>
            <th scope="col">Edit</th>
            <th scope="col">delte</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="serie in series" v-bind:key="serie.id">
            <th scope="row">{{serie.id}}</th>
            <td>{{serie.title}}</td>
            <td>{{serie.description}}</td>
            <td>{{serie.showtime}}</td>
            <td><img v-bind:src="serie.imgSeries" width="50" alt=""></td>
            <td><i class="far fa-edit"></i></td>
            <td><i class="far fa-trash-alt"></i></td>
            </tr>
        </tbody>
        </table>
        </div>

    </div>
</template>
<script>
export default {
    data(){
        return {
            series:[],
            episodes: [],
            users: [],
            episode:{
                id: '',
                title: '',
                description: '',
                duration:'',
                airing_time: '',
                seriesID: ''
            },
            isHidden: false,
            isHidden2: true,
            isHidden3: false,
            episode_id:'',
            edit: false
        }
    },
    created(){
        this.fetchEpisodes();
        this.frtchUsers();
        this.fetchSeries();
    },
    methods:{
        fetchSeries(){
            fetch('api/seriestvsapi')
            .then(res=>res.json())
            .then(res =>{
                this.series=res;
            })
        },
        frtchUsers(){
            fetch('api/usersapi')
            .then(res=>res.json())
            .then(res =>{
                this.users=res;
            })
        },
        fetchEpisodes(){
            fetch('api/episodeapi')
            .then(res=>res.json())
            .then(res =>{
                this.episodes=res;
            })
        },
        deleteEpisode(id){
            if(confirm('Are you sure?')){
                fetch(`api/episodeapi/${id}`, {
                    method: 'delete'
                })
                .then(res => res.json())
                .then(data => {
                    alert('episode deleted!');
                    this.fetchEpisodes();
                })
                .catch(err => console.log(err))
            }
        },
        addEpisode(){
            if(this.edit === false){
                //option Add episode
                fetch('api/episodeapi', {
                    method: 'post',
                    body: JSON.stringify(this.episode),
                    headers: {
                        'content-type': 'applicaton/json'
                    }
                })
                .then(res=>res.json())
                .then(data=>{
                    this.episode.title='';
                    this.episode.description=''
                    this.episode.airing_time='';
                    this.episode.duration='';
                    alert('Added');
                    this.fetchEpisodes();
                })
                .catch(err=> console.log(err));
            }
            else{
                //option Edit episode
            }
            
        }
    }
 }
</script>