class LuckySpinPrize {
  final int id;
  final String title;
  final String icon;

  LuckySpinPrize({
    required this.id,
    required this.title,
    required this.icon,
  });

  factory LuckySpinPrize.fromJson(Map<String, dynamic> json) {
    return LuckySpinPrize(
      id: json['id'] as int,
      title: json['title'] as String,
      icon: json['icon'] as String,
    );
  }
}
