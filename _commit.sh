
#export commit_msg="style:cleanup"
export remote_pull_path=/gi/wp-content/plugins/metasynt
git commit . -m "$commit_msg" && git push && ssh jgi@hu 'ssh root@py "cd '$remote_pull_path' && git pull"'

