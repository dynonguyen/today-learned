# Common Docker

> Xem thông tin docker

```
  docker info
```

# Images

> Xem image trên docker

```sh
  docker image ls
  # or
  docker images
```

> Search docker hub

```sh
  docker search <keyword>
```

> Tải 1 image về local repo

```sh
  docker pull <image>:<tag>
```

> Xóa 1 image

```sh
  docker image rm <image>:<tag>
  # or
  docker image rm <image_id>
```

> Vài tham số khi tạo container

```sh
  # -it là khởi tạo và chạy attach trên termial hiện tại
  docker run -it --name "container name" -h "Host name" <image>
```

> Xóa container

```sh
  docker rm <container>
  # xóa khi vẫn chạy
  docker rm -f <container>
```

> Lưu 1 image ra file

```sh
  docker save --output <filename.tar> <image>
```

> Load 1 image từ file

```sh
  docker load -i <filename>
```

> Đặt tên cho image

```sh
  docker tag <image_id> <image_name>:<tag>
```

# Containers

> Câu lệnh chung khởi chạy 1 container

```sh
  docker run [Options] <image> [command] [option_command]
```

> Liệt kê các Container

```sh
# Đang chạy
  docker ps

  # Tất cả
  docker ps -a
```

> Chạy lại 1 container đã tắt

```sh
  docker start <container name or id>

  # vào lại terminal của container đó
  docker attach <container>
```

> Chạy container và xóa khi kết thúc

```sh
  docker run -it --rm <image>
```

> Dừng 1 container đang chạy

```sh
  docker stop <container>

  # Dừng nếu đang trong terminal của container
  exit
  # or <Ctrl-C>

  # Thoát khỏi attach terminal của container nhưng không tắt container
  # <Ctrl P> <Ctrl Q>
```

> Thực thi 1 lệnh trong container khi ở ngoài container

```sh
  docker exec <container> <command>
```

> Commit 1 container thành 1 images để sao lưu dữ liệu trong container, nhầm mục đích tạo lại container với dữ liệu đó sau này.

```sh
  docker commit <container> <image_name:tag>
```

# Docker Volumes

> Do các container chạy độc lập nhau nên chúng ta không thể chia sẻ dữ liệu giữa chúng. Docker Volume giải quyết vấn đề này.

> Chia sẻ dữ liệu từ Host vào Docker (Volume -v)

```sh
  docker run -it -v <host_path>:<docker_path> <image>
  # Ex:
  docker run -it -v /storage/data:/home/data arch_linux

  # Cấu hình 1 container khác có volume như 1 container có sẵn
  docker run -it --volumes-from <other_container> <image>
```

> Liệt kê các volume trên docker

```
  docker volume ls
```

> Tạo 1 volume

```sh
  docker volume create <vol_name>
```

> Xem dữ liệu trong volume

```sh
  docker volume inspect <vol_name>
```

> Xóa 1 volume

```sh
  docker volume rm <vol_name>
```

> Mount volume vào container

```sh
  docker run -it --mount source=<volume_name>,target=<container_path> <image>
```

> Tạo 1 volume ánh xạ đến 1 ổ đĩa trên Host

```sh
  docker volume create --opt device=<host_path> --opt type=none --opt o=bind <volume_name>

  # Ánh xạ vào container
  docker run -it -v <vol_name>:<container_path> <image>
```

# Network

> Docker network dùng để kết nối các container trong Docker và kết nối ra bên ngoài Host.

> Liệt kê các network

```
  docker network ls
```

> Thông tin của 1 network

```
  docker network inspect <net_name>
```

> kiểm tra network của 1 container

```sh
  docker inspect <container>
```

> Ánh xạ localhost vào network của container

```sh
  docker run -it -p <host_port>:<container_port> <image>
```

> Tạo 1 network

```sh
  docker network create --driver <driver_name> <network_name>
```

> Các container cùng 1 network có thể connect lẫn nhau, khác network thì không.

> Connect 1 container tới 1 network khác khi container đang chạy

```sh
  docker network connect <net_name> <container>
```
