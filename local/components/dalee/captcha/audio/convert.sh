for i in *.wav;
    do name=`echo "$i" | cut -d'.' -f1`
    echo "$name"
    ffmpeg -i "$i" -vn -ar 22050 -ac 1 -b:a 64k  "${name}.mp3"
done
