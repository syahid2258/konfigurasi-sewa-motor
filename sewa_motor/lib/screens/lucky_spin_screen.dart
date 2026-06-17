import 'dart:core';
import 'dart:math';
import 'package:flutter/material.dart';
import '../models/lucky_spin_prize_model.dart';
import '../services/api_service.dart';

class LuckySpinScreen extends StatefulWidget {
  const LuckySpinScreen({super.key});

  @override
  State<LuckySpinScreen> createState() => _LuckySpinScreenState();
}

class _LuckySpinScreenState extends State<LuckySpinScreen> with SingleTickerProviderStateMixin {
  int userPoints = 0; 
  int pointsRequired = 1000;

  late AnimationController _animationController;
  late Animation<double> _animation;
  
  bool _isLoading = true;
  bool _isSpinning = false;
  int _selectedPrizeIndex = 0;

  List<LuckySpinPrize> _prizes = [];

  IconData _getIconData(String iconName) {
    switch (iconName) {
      case 'moped_rounded': return Icons.moped_rounded;
      case 'percent_rounded': return Icons.percent_rounded;
      case 'upgrade_rounded': return Icons.upgrade_rounded;
      case 'confirmation_number_rounded': return Icons.confirmation_number_rounded;
      case 'sports_motorsports_rounded': return Icons.sports_motorsports_rounded;
      case 'stars_rounded': return Icons.stars_rounded;
      case 'umbrella_rounded': return Icons.umbrella_rounded;
      case 'sentiment_dissatisfied_rounded': return Icons.sentiment_dissatisfied_rounded;
      default: return Icons.card_giftcard_rounded;
    }
  }

  @override
  void initState() {
    super.initState();
    _animationController = AnimationController(
      vsync: this,
      duration: const Duration(seconds: 4),
    );

    _animation = CurvedAnimation(
      parent: _animationController,
      curve: Curves.easeOutCubic,
    );

    _loadData();
  }

  Future<void> _loadData() async {
    try {
      final info = await ApiService.getLuckySpinInfo();
      final prizesData = info['prizes'] as List<dynamic>;
      setState(() {
        _prizes = prizesData.map((e) => LuckySpinPrize.fromJson(e)).toList();
        userPoints = info['user_points'];
        pointsRequired = info['points_required'];
        _isLoading = false;
      });
    } catch (e) {
      ScaffoldMessenger.of(context).showSnackBar(SnackBar(content: Text('Gagal memuat data')));
    }
  }

  @override
  void dispose() {
    _animationController.dispose();
    super.dispose();
  }

  Future<void> _startLuckySpin() async {
    if (_isSpinning) return;

    if (userPoints < pointsRequired) {
      ScaffoldMessenger.of(context).showSnackBar(
        SnackBar(
          content: Text('Poin kamu tidak cukup! Butuh $pointsRequired poin untuk memutar.'),
          backgroundColor: Colors.redAccent,
          behavior: SnackBarBehavior.floating,
        ),
      );
      return;
    }

    setState(() {
      _isSpinning = true;
    });

    try {
      final res = await ApiService.doLuckySpin();
      final selectedPrizeId = res['prize']['id'];
      
      int foundIndex = _prizes.indexWhere((p) => p.id == selectedPrizeId);
      if (foundIndex == -1) foundIndex = 0; // Fallback

      _selectedPrizeIndex = foundIndex;

      double prizeAngle = (360 / _prizes.length) * _selectedPrizeIndex;
      double totalRotation = (360 * 5) + prizeAngle; 

      _animationController.reset();
      _animation = Tween<double>(begin: 0, end: totalRotation * (pi / 180)).animate(
        CurvedAnimation(parent: _animationController, curve: Curves.easeOutCubic),
      );

      _animationController.forward().then((_) {
        _showPrizeDialog(_prizes[_selectedPrizeIndex].title);
        setState(() {
          userPoints = res['user_points'];
          _isSpinning = false;
        });
      });
    } catch (e) {
      setState(() {
        _isSpinning = false;
      });
      ScaffoldMessenger.of(context).showSnackBar(SnackBar(content: Text(e.toString())));
    }
  }

  void _showPrizeDialog(String prizeTitle) {
    showDialog(
      context: context,
      barrierDismissible: false,
      builder: (context) => AlertDialog(
        shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(24)),
        backgroundColor: Colors.white,
        title: const Text(
          'Selamat 🎉',
          textAlign: TextAlign.center,
          style: TextStyle(fontWeight: FontWeight.bold, color: Color(0xFF2D3142)),
        ),
        content: Column(
          mainAxisSize: MainAxisSize.min,
          children: [
            const Icon(Icons.card_giftcard_rounded, size: 72, color: Color(0xFF7A58E6)),
            const SizedBox(height: 16),
            const Text(
              'Kamu berhasil mendapatkan:',
              textAlign: TextAlign.center,
              style: TextStyle(color: Colors.grey),
            ),
            const SizedBox(height: 8),
            Text(
              prizeTitle,
              textAlign: TextAlign.center,
              style: const TextStyle(fontSize: 20, fontWeight: FontWeight.bold, color: Color(0xFF7A58E6)),
            ),
          ],
        ),
        actions: [
          TextButton(
            onPressed: () => Navigator.pop(context),
            child: const Text('Klaim Hadiah', style: TextStyle(color: Color(0xFF7A58E6), fontWeight: FontWeight.bold)),
          ),
        ],
      ),
    );
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: const Color(0xFFFAFBFF),
      appBar: AppBar(
        title: const Text('Lucky Spin Reward', style: TextStyle(color: Color(0xFF2D3142), fontWeight: FontWeight.bold, fontSize: 18)),
        backgroundColor: Colors.transparent,
        elevation: 0,
        leading: IconButton(
          icon: const Icon(Icons.arrow_back_ios_new_rounded, color: Color(0xFF2D3142), size: 20),
          onPressed: () => Navigator.pop(context),
        ),
      ),
      body: _isLoading 
        ? const Center(child: CircularProgressIndicator(color: Color(0xFF7A58E6)))
        : Center(
        child: SingleChildScrollView(
          padding: const EdgeInsets.all(24.0),
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              Container(
                padding: const EdgeInsets.symmetric(horizontal: 20, vertical: 12),
                decoration: BoxDecoration(
                  color: const Color(0xFF7A58E6).withOpacity(0.1),
                  borderRadius: BorderRadius.circular(16),
                ),
                child: Row(
                  mainAxisSize: MainAxisSize.min,
                  children: [
                    const Icon(Icons.stars_rounded, color: Color(0xFF7A58E6), size: 24),
                    const SizedBox(width: 8),
                    Text(
                      '$userPoints Poin Anda',
                      style: const TextStyle(fontSize: 16, fontWeight: FontWeight.bold, color: Color(0xFF7A58E6)),
                    ),
                  ],
                ),
              ),
              const SizedBox(height: 12),
              Text(
                'Butuh $pointsRequired poin untuk 1x putar game roda keberuntungan.',
                textAlign: TextAlign.center,
                style: const TextStyle(fontSize: 12, color: Colors.grey),
              ),
              const SizedBox(height: 40),

              Stack(
                alignment: Alignment.center,
                children: [
                  AnimatedBuilder(
                    animation: _animation,
                    builder: (context, child) {
                      return Transform.rotate(
                        angle: _animation.value,
                        child: Container(
                          width: 300,
                          height: 300,
                          decoration: BoxDecoration(
                            shape: BoxShape.circle,
                            color: Colors.white,
                            border: Border.all(color: const Color(0xFF7A58E6), width: 8),
                            boxShadow: [
                              BoxShadow(color: Colors.black.withOpacity(0.05), blurRadius: 20, offset: const Offset(0, 8)),
                            ],
                          ),
                          child: Stack(
                            children: List.generate(_prizes.length, (index) {
                              double angle = (2 * pi / _prizes.length) * index;
                              return Transform.rotate(
                                angle: angle,
                                child: Align(
                                  alignment: Alignment.topCenter,
                                  child: Padding(
                                    padding: const EdgeInsets.only(top: 24.0),
                                    child: RotatedBox(
                                      quarterTurns: 1,
                                      child: Icon(
                                        _getIconData(_prizes[index].icon),
                                        color: index % 2 == 0 ? const Color(0xFF7A58E6) : const Color(0xFF8F6EFA),
                                        size: 28,
                                      ),
                                    ),
                                  ),
                                ),
                              );
                            }),
                          ),
                        ),
                      );
                    },
                  ),
                  Positioned(
                    top: 0,
                    child: Container(
                      width: 16,
                      height: 32,
                      decoration: const BoxDecoration(
                        color: Colors.amber,
                        borderRadius: BorderRadius.only(bottomLeft: Radius.circular(8), bottomRight: Radius.circular(8)),
                      ),
                    ),
                  ),
                  Container(
                    width: 44,
                    height: 44,
                    decoration: const BoxDecoration(color: Colors.white, shape: BoxShape.circle),
                    child: const Icon(Icons.adjust_rounded, color: Color(0xFF7A58E6)),
                  ),
                ],
              ),
              const SizedBox(height: 50),

              SizedBox(
                width: 220,
                height: 54,
                child: ElevatedButton(
                  style: ElevatedButton.styleFrom(
                    backgroundColor: const Color(0xFF7A58E6),
                    foregroundColor: Colors.white,
                    disabledBackgroundColor: Colors.grey.shade300,
                    shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(16)),
                    elevation: 0,
                  ),
                  onPressed: _isSpinning || _prizes.isEmpty ? null : _startLuckySpin,
                  child: _isSpinning
                      ? const SizedBox(width: 24, height: 24, child: CircularProgressIndicator(color: Colors.white, strokeWidth: 2.5))
                      : const Text('Putar Sekarang', style: TextStyle(fontSize: 16, fontWeight: FontWeight.bold)),
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}