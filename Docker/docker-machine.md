# Docker Machine (DM)

> **Docker Machine** là một provisioning tool giúp dễ dàng tiếp cận Docker. DM giúp tạo các máy ảo chạy Docker độc lập trên Virtual Machine.

> **Docker Machine** sẽ tạo các máy ảo và cài Docker Engine lên chúng và cuối cùng nó sẽ cấu hình Docker Client để giao tiếp với Docker Engine một cách bảo mật.

> Tải docker-machine cho Arch Linu

```
  sudo pacman -S docker-machine
```

Nếu Docker Machine không thể tạo do lỗi config IP thì sửa như sau:

```
  sudo mkdir /etc/vbox
  sudo vi /etc/vbox/networks.conf

  * 0.0.0.0/0 ::/0
```

# Command

> Tạo DM

```Dockerfile
  docker-machine create -driver <driver> <dm_name>
  # Ex
  docker-machine create -driver virtualbox vps0
  docker-machine create -driver hyperv vps0
```

> Xóa DM

```Dockerfile
  docker-machine rm <dm_id>
```

> Liệt kê danh sách DM

```Dockerfile
  docker-machine ls
```

> Stop & Start

```Dockerfile
  docker-machine start/stop <dm_name>
```

> SSH vào docker machine

```
  docker-machine ssh <dm_name>
```

> Chia sẻ dữ liệu giữa máy host và docker machine

```
  docker-machine scp [-r] <host_path> <dm_name>:<dm_path>
  docker-machine scp [-r] <dm_name>:<dm_path> <host_path>
```

> Xem IP của 1 DM

```
  docker-machine ip <dm_name>
```
